<!DOCTYPE html>
<html>
<head>
 <title>Определение знака зодиака</title>
 <style>
 body {
  font-family: 'Arial', sans-serif;
  background-color: #f5f5f5;
  color: #333;
  margin: 0;
  padding: 20px;
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  flex-direction: column;
}

h1 {
  color: #333;
}
form {
  background-color: #fff;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 2px 4px rgba(0,0,0,0.1);
  display: flex;
  flex-direction: column;
  gap: 10px;
  width: 100%;
  max-width: 400px;
}

input[type="text"], input[type="submit"] {
  padding: 10px;
  border-radius: 4px;
  border: 1px solid #ccc;
  width: 100%;
}

input[type="submit"] {
  background-color: #007bff;
  color: white;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #0056b3;
}
.result {
  margin-top: 20px;
  padding: 10px;
  background-color: #d1e7dd;
  color: #0f5132;
  border-radius: 4px;
  border: 1px solid #badbcc;
  width: 100%;
  max-width: 400px;
  text-align: center;
}

.result {
  margin-top: 20px;
  padding: 15px;
  border-radius: 4px;
  text-align: center;
  width: 100%;
  max-width: 400px;
  box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.success {
  background-color: #d1e7dd;
  color: #0f5132;
  border: 1px solid #badbcc;
}


.error {
  background-color: #f8d7da;
  color: #842029;
  border: 1px solid #f5c2c7;
}

 </style>
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
   
    echo "<div class='result success'>Знак зодиака для даты {$dateStr} - {$zodiac}</div>";
  } else {
  
    echo "<div class='result error'>Не удалось определить знак зодиака для даты {$dateStr}</div>";
  }
 }
 ?>
</body>
</html>


