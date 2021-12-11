## Currently working employees

```
SELECT
  *
FROM
  employees
WHERE
  shift_start < '$currentHour'
  AND '$currentHour' < shift_end
ORDER BY
  job_position,
  name
```
