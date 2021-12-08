SELECT
  COUNT(*) AS "orders_amount"
FROM
  orders
WHERE
  order_date BETWEEN '2021-11-21 00:00:00'
  AND '2021-12-8 00:00:00'