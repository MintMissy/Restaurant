import random
from dummy_data import *


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
def generate_client(postcode_to_residence):
    f = open("generated-sql/clients-insert.sql", "w")


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
def generate_meals(meal_names, min_price, max_price):
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
def generate_order():
    pass
