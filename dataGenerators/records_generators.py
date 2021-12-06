import random
from dummy_data import *
from datetime import datetime


def generate_phone_number():
    number = ""
    number += "0" + str(random.randint(77, 79))
    number += " "
    number += str(random.randint(0, 9999)).zfill(4)
    number += " "
    number += str(random.randint(0, 9999)).zfill(4)
    return number


def generate_person():
    surname = random.choice(surnames)

    # Generate man data
    if random.random() < 0.5:
        name = random.choice(men_names)
        return name, surname, "male"

    # Generate woman data
    name = random.choice(women_names)
    return name, surname, "female"


def generate_location():
    postcode, location = random.choice(list(postcode_to_location.items()))
    location_full = location + " " + str(random.randint(1, 49))
    return postcode, location_full


# ID NAME SURNAME SEX RESIDENCE POSTCODE PHONENUMBER
def generate_clients(amount):
    path = "generated-sql/clients-insert.sql"

    f = open(path, "w")
    f.write(f"INSERT INTO `clients`(`name`, `surname`, `sex`, `residence`, `postcode`, `phone_number`) VALUES\n")
    f.close()

    f = open(path, "a+")
    for i in range(amount):
        name, surname, sex = generate_person()
        postcode, residence = generate_location()
        phone_number = generate_phone_number()

        if i != amount - 1:
            f.write(f"('{name}','{surname}','{sex}','{residence}','{postcode}','{phone_number}'),\n")
        else:
            f.write(f"('{name}','{surname}','{sex}','{residence}','{postcode}','{phone_number}')")
    f.close()


# ID NAME SURNAME SEX RESIDENCE POSTCODE SHIFT_START SHIFT_END PHONE_NUMBER LEFT_DAYS_OFF JOB_POSITION
def generate_employees(amount):
    path = "generated-sql/employees-insert.sql"

    f = open(path, "w")
    f.write(f"INSERT INTO `employees`"
            f"(`name`, `surname`, `sex`, `residence`, `postcode`, `shift_start`, `shift_end`, "
            f"`phone_number`, `left_days_off`, `job_position`) VALUES\n")
    f.close()

    f = open(path, "a+")
    for i in range(amount):
        name, surname, sex = generate_person()
        postcode, residence = generate_location()
        shift_start, shift_end = random.choice(shifts)
        phone_number = generate_phone_number()
        left_days_off = random.randint(0, 28)
        job_position = random.choice(default_job_positions)

        if i != amount - 1:
            f.write(f"('{name}','{surname}','{sex}','{residence}','{postcode}','{shift_start}',"
                    f"'{shift_end}', '{phone_number}','{left_days_off}','{job_position}'),\n")
        else:
            f.write(f"('{name}','{surname}','{sex}','{residence}','{postcode}','{shift_start}',"
                    f"'{shift_end}', '{phone_number}','{left_days_off}','{job_position}')\n")

    f.close()


# ID NAME COST_NET
def generate_meals(min_price, max_price):
    f = open("generated-sql/meals-insert.sql", "w")
    last_meal_name = meal_names[-1]
    f.write("INSERT INTO `meals`(`name`, `cost_net`) VALUES\n")
    for meal_name in meal_names:
        meal_cost = random.uniform(min_price, max_price)
        meal_cost = round(meal_cost, 2)

        if meal_name != last_meal_name:
            f.write(f"(\"{meal_name}\", {meal_cost}),\n")
        else:
            f.write(f"(\"{meal_name}\", {meal_cost})")

    f.close()


def generate_order_dates(start_date, days_to_generate, min_preparation_time, max_preparation_time,
                         min_delivery_time, max_delivery_time, min_orders_per_hour, max_orders_per_hour):
    first_shift = 6
    last_shift = 22
    stationary_order_chance = 0.3

    # YEAR MONTH DAY hh mm ss
    # Convert string to datetime then to timestamp (number from time.time)
    start_date = datetime.strptime(start_date, "%Y-%m-%d %H:%M:%S")
    start_date = datetime.timestamp(start_date)

    orders_dates = []

    for day in range(days_to_generate):
        for hour in range(first_shift, last_shift):
            orders_in_hour = random.randint(min_orders_per_hour, max_orders_per_hour) + 1
            for i in range(orders_in_hour):
                bonus_days_in_timestamp = day * 24 * 60 * 60
                bonus_hours_in_timestamp = hour * 60 * 60
                bonus_timestamp = bonus_days_in_timestamp + bonus_hours_in_timestamp

                ordering_date_timestamp = start_date + bonus_timestamp

                ordering_date = datetime.fromtimestamp(ordering_date_timestamp)
                shipment_date = ""
                pickup_date = ""

                preparation_time = random.randint(min_preparation_time, max_preparation_time)
                preparation_time_timestamp = preparation_time * 60

                # Stationary order (doesn't have shipping time)
                if random.random() < stationary_order_chance:
                    pickup_date_timestamp = ordering_date_timestamp + preparation_time_timestamp
                    pickup_date = datetime.fromtimestamp(pickup_date_timestamp)
                # To go order
                else:
                    shipment_date_timestamp = ordering_date_timestamp + preparation_time_timestamp
                    shipment_date = datetime.fromtimestamp(shipment_date_timestamp)

                    ship_time = random.randint(min_delivery_time, max_delivery_time)
                    ship_time_timestamp = ship_time * 60

                    pickup_date_timestamp = shipment_date_timestamp + ship_time_timestamp
                    pickup_date = datetime.fromtimestamp(pickup_date_timestamp)

                orders_dates.append([str(ordering_date), str(shipment_date), str(pickup_date)])

    return orders_dates


# ID CLIENT_ID MEAL_ID QUANTITY DELIVERY_PLACE DELIVERY_POSTCODE ORDER_DATE SHIP_DATE PICKUP_DATE
def generate_orders(days, min_client_id, max_client_id, min_meal_id, max_meal_id, min_quantity, max_quantity):
    path = "generated-sql/orders-insert.sql"

    f = open(path, "w")
    f.write("INSERT INTO `orders`(`client_id`, `meal_id`, `quantity`, `delivery_place`,"
            "`delivery_postcode`, `order_date`, `ship_date`,`pickup_date`) VALUES\n")
    f.close()

    order_dates = generate_order_dates("2021-11-13 06:00:00", days, 12, 26, 7, 27, 2, 5)

    f = open(path, "a+")
    for i in range(len(order_dates)):
        client_id = random.randint(min_client_id, max_client_id)
        meal_id = random.randint(min_meal_id, max_meal_id)
        quantity = random.randint(min_quantity, max_quantity)
        delivery_postcode, delivery_place = generate_location()
        ordering_date = order_dates[i][0]
        shipment_date = order_dates[i][1]
        pickup_date = order_dates[i][2]

        if i != len(order_dates) - 1:
            f.write(f"('{client_id}','{meal_id}','{quantity}','{delivery_place}', "
                    f"'{delivery_postcode}','{ordering_date}', '{shipment_date}', '{pickup_date}'),\n")
        else:
            f.write(f"('{client_id}','{meal_id}','{quantity}','{delivery_place}', "
                    f"'{delivery_postcode}','{ordering_date}', '{shipment_date}', '{pickup_date}')")

    f.close()
