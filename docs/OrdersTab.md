## Get pending orders

```
SELECT
  o.id,
  CONCAT(c.name, ' ', c.surname) AS 'client',
  m.name AS 'meal',
  o.quantity,
  o.delivery_place,
  o.delivery_postcode,
  o.order_date,
  o.shipment_date,
  o.pickup_date,
  o.order_type
FROM
  orders o
  JOIN clients c on o.client_id = c.id
  JOIN meals m on o.meal_id = m.id
WHERE
  (
    o.pickup_date = '0000-00-00 00:00:00'
    AND o.order_type = 'Stationary'
  )
  OR (
    o.shipment_date = '0000-00-00 00:00:00'
    AND o.order_type = 'To go'
  )
ORDER BY
  o.order_date DESC
```

## Get shipped orders

```
SELECT
  o.id,
  CONCAT(c.name, ' ', c.surname) AS 'client',
  m.name AS 'meal',
  o.quantity,
  o.delivery_place,
  o.delivery_postcode,
  o.order_date,
  o.shipment_date,
  o.pickup_date,
  o.order_type
FROM
  orders o
  JOIN clients c on o.client_id = c.id
  JOIN meals m on o.meal_id = m.id
WHERE
  o.shipment_date <> '0000-00-00 00:00:00'
  AND o.pickup_date = '0000-00-00 00:00:00'
  AND o.order_type = 'To go'
ORDER BY
  o.shipment_date DESC
```

## Get realized orders

```
SELECT
  o.id,
  CONCAT(c.name, ' ', c.surname) AS 'client',
  m.name AS 'meal',
  o.quantity,
  o.delivery_place,
  o.delivery_postcode,
  o.order_date,
  o.shipment_date,
  o.pickup_date,
  o.order_type
FROM
  orders o
  JOIN clients c on o.client_id = c.id
  JOIN meals m on o.meal_id = m.id
WHERE
  o.pickup_date <> '0000-00-00 00:00:00'
ORDER BY
  o.order_date DESC
LIMIT
  $limit
```
