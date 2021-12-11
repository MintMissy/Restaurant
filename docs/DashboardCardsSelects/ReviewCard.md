## Total orders from range ...

```
SELECT
  COUNT(*) AS 'orders_amount'
FROM
  orders
WHERE
  order_date BETWEEN '$previousDate'
  AND '$currentDate'
```

## Meal of the...

```
SELECT
  m.name
FROM
  orders o
  JOIN meals m ON m.id = o.meal_id
WHERE
  o.order_date > '$previousDate'
  AND o.order_date < '$currentDate'
GROUP BY
  m.id
ORDER BY
  SUM(o.quantity) DESC
LIMIT
  1
```

### Get income from range ...

SELECT
SUM(o.quantity \* m.cost_net) AS net_income
FROM
orders o
JOIN meals m ON m.id = o.meal_id
WHERE
o.order_date < '$currentDate'
  AND o.order_date > '$previousDate'
