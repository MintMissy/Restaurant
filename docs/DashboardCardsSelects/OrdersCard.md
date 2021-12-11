## Pending Orders Amount

```
SELECT
  count(id)
FROM
  orders
WHERE
  (
    pickup_date = '0000-00-00 00:00:00'
    AND order_type = 'Stationary'
  )
  OR (
    shipment_date = '0000-00-00 00:00:00'
    AND order_type = 'To go'
  )
```

## Shipped Orders Amount

```
SELECT
  COUNT(*)
FROM
  orders
WHERE
  shipment_date <> '0000-00-00 00:00:00'
  AND pickup_date = '0000-00-00 00:00:00'
  AND order_type = 'To go'
```

## Realized Orders Amount

```
SELECT
  COUNT(id)
FROM
  `orders`
WHERE
  pickup_date <> '0000-00-00 00:00:00'
```
