from random import randint
min_storage_amount = 0
max_storage_amount = 100


def generate_client(amount):
    pass


def generate_employee(amount):
    pass


def generate_meal():
    pass


def generate_order():
    pass


storage = {
    "White Wine": "",
    "Red Wine": "L",
    "Milk": "L",
    "Pasta": "Kg",
    "": "",
    "": "",
    "": "",
    "": "",
    "": "",
    "": "",
}

# Clients
# ID NAME SURNAME SEX RESIDENCE POSTCODE PHONENUMBER

# Employees
# ID NAME SURNAME SEX RESIDENCE POSTCODE SHIFT_START SHIFT_END PHONE_NUMBER LEFT_DAYS_OFF JOB_POSITION

# Meals
# ID NAME COST_NET

# Orders
# ID CLIENT_ID MEAL_ID QUANTITY DELIVERY_PLACE DELIVERY_POSTCODE ORDER_DATE SHIP_DATE PICKUP_DATE

# Storage
# ID ITEM_NAME ITEM_QUANTITY QUANTITY_UNIT RECOMMENDED_QUANTITY
