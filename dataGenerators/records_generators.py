import random
from random import randint

def generate_client(amount):
    pass


def generate_employee(amount):
    pass


def generate_meals(meal_names, min_price, max_price):
    f = open("meals.txt", "w")

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




def generate_order():
    pass


# Clients
# ID NAME SURNAME SEX RESIDENCE POSTCODE PHONENUMBER

# Employees
# ID NAME SURNAME SEX RESIDENCE POSTCODE SHIFT_START SHIFT_END PHONE_NUMBER LEFT_DAYS_OFF JOB_POSITION

# Meals
# ID NAME COST_NET

# Orders
# ID CLIENT_ID MEAL_ID QUANTITY DELIVERY_PLACE DELIVERY_POSTCODE ORDER_DATE SHIP_DATE PICKUP_DATE