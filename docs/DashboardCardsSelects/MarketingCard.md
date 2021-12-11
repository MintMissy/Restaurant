## The busiest location

```
SELECT
  o.delivery_postcode
FROM
  orders o
  JOIN (
    SELECT
      delivery_postcode,
      COUNT(*) AS ctn
    FROM
      orders
    GROUP BY
      delivery_postcode
  ) o2 ON (o.delivery_postcode = o2.delivery_postcode)
GROUP BY
  delivery_postcode
ORDER BY
  o2.ctn DESC
LIMIT
  1
```

## Busiest week day

```
SELECT
  WEEKDAY(order_date)
FROM
  orders
group by
  WEEKDAY(ORDER_DATE)
ORDER BY
  count(order_date) DESC
LIMIT
  1
```

## Quietest week day

```
SELECT
  WEEKDAY(order_date)
FROM
  orders
group by
  WEEKDAY(ORDER_DATE)
ORDER BY
  count(order_date)
LIMIT
  1
```

## Last purchase date

```
SELECT
  DATE_FORMAT(order_date, '%Y-%m-%d %H:%i:%S')
FROM
  orders
ORDER BY
  order_date DESC
LIMIT
  1
```

## Last sold meal

```
SELECT
  m.name
FROM
  orders o
  JOIN meals m ON m.id = o.meal_id
ORDER BY
  order_date DESC
LIMIT
  1
```

## Mostly bought meal

```
SELECT
  m.name
FROM
  orders o
  JOIN meals m ON m.id = o.meal_id
WHERE
  1
GROUP BY
  m.id
ORDER BY
  SUM(o.quantity) DESC
LIMIT
  1
```

## Most revenue meal

```
SELECT
  m.name
FROM
  orders o
  JOIN meals m ON m.id = o.meal_id
WHERE
  1
GROUP BY
  m.id
ORDER BY
  SUM(o.quantity * m.cost_net) DESC
LIMIT
  1
```

## Least bought meal

```
SELECT
  m.name
FROM
  orders o
  JOIN meals m ON m.id = o.meal_id
WHERE
  1
GROUP BY
  m.id
ORDER BY
  SUM(o.quantity)
LIMIT
  1
```

## Least revenue meal

```
SELECT
  m.name
FROM
  orders o
  JOIN meals m ON m.id = o.meal_id
WHERE
  1
GROUP BY
  m.id
ORDER BY
  SUM(o.quantity * m.cost_net)
LIMIT
  1
```
