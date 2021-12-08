select
  WEEKDAY(order_date)
FROM
  orders
group by
  WEEKDAY(ORDER_DATE)
order by
  count(order_date) desc
limit
  1