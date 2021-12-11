## General average preparation time

```
SELECT
  AVG(t.time_diff)
FROM
  (
    SELECT
      TIMEDIFF(o1.pickup_date, o1.order_date) AS time_diff
    FROM
      orders o1
    WHERE
      o1.order_type = 'Stationary'
      AND o1.order_date <> '0000-00-00 00:00:00'
      AND o1.pickup_date <> '0000-00-00 00:00:00'
    UNION
    ALL
    SELECT
      TIMEDIFF(o2.shipment_date, o2.order_date) AS time_diff
    FROM
      orders o2
    WHERE
      o2.order_type = 'To go'
      AND o2.order_date <> '0000-00-00 00:00:00'
      AND o2.shipment_date <> '0000-00-00 00:00:00'
  )
```

## Stationary average preparation time

```
SELECT
  AVG(TIMEDIFF(pickup_date, order_date))
FROM
  orders
WHERE
  order_type = 'Stationary'
  AND order_date <> '0000-00-00 00:00:00'
  AND pickup_date <> '0000-00-00 00:00:00'
```

## To go average preparation time

```
SELECT
  AVG(TIMEDIFF(shipment_date, order_date))
FROM
  orders
WHERE
  order_type = 'To go'
  AND order_date <> '0000-00-00 00:00:00'
  AND shipment_date <> '0000-00-00 00:00:00'
```

## Average delivery time

```
SELECT
  AVG(TIMEDIFF(pickup_date, shipment_date))
FROM
  orders
WHERE
  order_type = 'To go'
  AND shipment_date <> '0000-00-00 00:00:00'
  AND pickup_date <> '0000-00-00 00:00:00'
```

## Stationary orders percentage

```
SELECT
  COUNT(*) / (
    SELECT
      COUNT(*)
    FROM
      orders
  ) * 100
FROM
  orders o1
WHERE
  o1.order_type = 'Stationary';
```

## To go orders percentage

```
SELECT
  COUNT(*) / (
    SELECT
      COUNT(*)
    FROM
      orders
  ) * 100
FROM
  orders o1
WHERE
  o1.order_type = 'To go';
```

## Most loyal client

```
SELECT
  CONCAT(c.name, ' ', c.surname) AS best_client,
  COUNT(o.id) AS orders_amount
FROM
  orders o
  JOIN clients c ON c.id = o.client_id
GROUP BY
  c.id
ORDER BY
  orders_amount DESC
LIMIT
  1
```

## Most lavish client

```
SELECT
  CONCAT(c.name, ' ', c.surname) AS best_client,
  SUM(m.cost_net) AS spent_money
FROM
  orders o
  JOIN clients c ON c.id = o.client_id
  JOIN meals m ON m.id = o.meal_id
GROUP BY
  c.id
ORDER BY
  spent_money DESC
LIMIT
  1
```
