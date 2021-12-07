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