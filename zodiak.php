<!DOCTYPE html>
<html>
<head>
 <title>Определение знака зодиака</title>
</head>
<body>
 <form method="post">
  <label for="date">Введите дату:</label>
  <input type="text" id="date" name="date">
  <input type="submit" name="submit" value="Определить знак зодиака">
 </form>

 <?php
 if (isset($_POST['submit'])) {
  $dateStr = $_POST['date'];
  $dateParts = explode('.', $dateStr);
  $day = (int)$dateParts[0];
  $month = (int)$dateParts[1];

  $zodiacIntervals = [
   'Водолей' => ['21.01', '19.02'], 'Рыбы' => ['20.02', '20.03'],
   'Овен' => ['21.03', '20.04'], 'Телец' => ['21.04', '21.05'], 
   'Близнецы' => ['22.05', '21.06'], 'Рак' => ['22.06', '22.07'], 
   'Лев' => ['23.07', '21.08'], 'Дева' => ['22.08', '23.09'], 
   'Весы' => ['24.09', '23.10'], 'Скорпион' => ['24.10', '22.11'],
   'Стрелец' => ['23.11', '22.12'], 'Козерог' => ['23.12', '20.01']
  ];

  $zodiac = '';
  foreach ($zodiacIntervals as $sign => $interval) {
   $startMonth = (int)explode('.', $interval[0])[1];
   $startDay = (int)explode('.', $interval[0])[0];
   $endMonth = (int)explode('.', $interval[1])[1];
   $endDay = (int)explode('.', $interval[1])[0];
   if (($month == $startMonth && $day >= $startDay) || 
    ($month == $endMonth && $day <= $endDay) ||
    ($month > $startMonth && $month < $endMonth)) {
    $zodiac = $sign;
    break;
   }
  }

  if ($zodiac) {
   echo "Знак зодиака для даты {$dateStr} - {$zodiac}";
  } else {
   echo "Не удалось определить знак зодиака для даты {$dateStr}";
  }
 }
 ?>
</body>
</html>

