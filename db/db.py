import random
from faker import Faker
from datetime import datetime, timedelta, date

fake = Faker()

positions = ['CEO', 'CFO', 'CMO', 'COO', 'Human Resources Manager', 'IT Manager', 'Marketing Manager', 'Product Manager', 'Sales Manager', 'Admin Assistant', 'Accountant', 'Bookkeeper', 'Business Analyst', 'Sales Representative', 'Jr Software Engineer', 'Sr Software Engineer']
genders = ['Male', 'Female']
statuses = ['Single', 'Married', 'Separated', 'Widowed']

current_year = datetime.now().year
one_year_from_now = date.today() + timedelta(days=365)
thirty_years_from_now = date.today() + timedelta(days=365*30)


with open('db/db.txt', 'w') as f:
    for position in ['CEO', 'CFO', 'CMO', 'COO']:
        positions.remove(position)
        age = random.randint(20, 60)
        bday = datetime(current_year - age, random.randint(1, 12), random.randint(1, 28))
        name = fake.name()
        email = f"{name.lower().replace(' ', '.')}@example.com"
        f.write(f"INSERT INTO `ems_data` (`name`, `age`, `position`, `email`, `salary`, `bday`, `gender`, `status`, `number`, `endcontract`) VALUES ('{name}', {age}, '{position}', '{email}', '{random.uniform(120000, 150000):.2f}', '{bday.date()}', '{random.choice(genders)}', '{random.choice(statuses)}', '09{random.randint(100000000, 999999999)}', '{fake.date_between(start_date=one_year_from_now, end_date=thirty_years_from_now)}');\n")

    for _ in range(96):
        age = random.randint(20, 60)
        bday = datetime(current_year - age, random.randint(1, 12), random.randint(1, 28))
        name = fake.name()
        email = f"{name.lower().replace(' ', '.')}@example.com"
        f.write(f"INSERT INTO `ems_data` (`name`, `age`, `position`, `email`, `salary`, `bday`, `gender`, `status`, `number`, `endcontract`) VALUES ('{name}', {age}, '{random.choice(positions)}', '{email}', '{random.uniform(30000, 100000):.2f}', '{bday.date()}', '{random.choice(genders)}', '{random.choice(statuses)}', '09{random.randint(100000000, 999999999)}', '{fake.date_between(start_date=one_year_from_now, end_date=thirty_years_from_now)}');\n")