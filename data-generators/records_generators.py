import random
from dummy_data import *
from data_generators import *


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


# ID CLIENT_ID MEAL_ID QUANTITY DELIVERY_PLACE DELIVERY_POSTCODE ORDER_DATE SHIP_DATE PICKUP_DATE
def generate_orders(days, min_client_id, max_client_id, min_meal_id, max_meal_id, min_quantity, max_quantity):
    path = "generated-sql/orders-insert.sql"

    f = open(path, "w")
    f.write("INSERT INTO `orders`(`client_id`, `meal_id`, `quantity`, `delivery_place`,"
            "`delivery_postcode`, `order_date`, `shipment_date`,`pickup_date`) VALUES\n")
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
