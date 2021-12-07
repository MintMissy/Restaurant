SELECT
  *
FROM
  employees
WHERE
  shift_start < '10:45:12'
  AND ' 10 :45 :12 "' < shift_end
ORDER BY
  job_position,
  name