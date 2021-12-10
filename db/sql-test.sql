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
  ) t "