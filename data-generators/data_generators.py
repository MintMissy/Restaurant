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