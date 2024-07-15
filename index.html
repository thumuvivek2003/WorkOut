<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<head>
  <meta charset="UTF-8">
  <title>Workout Timer</title>
  <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="container">
      <div class="controls">
          <h2 id='workoutRemainingTimeDiv' class="button-71"><span id="workoutRemainingTime">0</span></h2>
          <h2 id='restRemainingTimeDiv' class="button-71"><span id="restRemainingTime">0</span></h2>
    </div>
    <div class="header">
      <span id="currWorkout">Strengthen</span>
      <span id="currDuration">Your Body</span>
    </div>
    <table id="workoutTable">
      <thead>
        <tr>
          <th>Name</th>
          <th>Duration (seconds)</th>
          <th>Start</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
  </div>
    <button id="startTimer" role="button" class="btn button-29">Start Timer</button>
    <a href='updateWorkOut.php'><button role="button" style='margin-top:5px' class="btn button-29">Edit Table</button></a>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
      // script.js
$(document).ready(function () {
    let workOutNames = [];
    let workOutDurations = [];
    
    if (localStorage.getItem('workOutData')) {
        const storedData = JSON.parse(localStorage.getItem('workOutData'));
        workOutNames = storedData.map(workout => workout.workOutName);
        workOutDurations = storedData.map(workout => workout.workOutDuration);
    } else {
        const workOutNames = ["Jumping Jack", "Leg Raises", "Flutter Kicks", "Scissor Kicks", "Feet Off Crunches", "Plank Knee To Elbow", "Jumping Climber", "Alternate V Sit Up", "Hollow Hold"];
        const workOutDurations = new Array(10).fill(45);
        const defaultWorkOutData = workOutNames.map((name, index) => ({
            workOutName: name,
            workOutDuration: workOutDurations[index]
        }));
        localStorage.setItem('workOutData', JSON.stringify(defaultWorkOutData));
    }
    
    // Use workOutNames and workOutDurations as needed


  const restDuration = 10; // rest time between workouts in seconds
  let currentIndex = 0;
  let workoutTimerInterval;
  let restTimerInterval;

  function populateTable() {
    const tbody = $("#workoutTable tbody");
    workOutNames.forEach((name, index) => {
      const duration = workOutDurations[index];
      tbody.append(`
        <tr data-index="${index}">
          <td>${name}</td>
          <td>${duration}</td>
          <td><button class="startFromHere button-30" role="button">P</button></td>
        </tr>
      `);
    });
  }

  function startWorkoutTimer() {
    clearInterval(workoutTimerInterval);
    clearInterval(restTimerInterval);
    let currentDuration = workOutDurations[currentIndex];
    updateDisplay(workOutNames[currentIndex], currentDuration, "workout");
    let remainingTime = currentDuration;

    workoutTimerInterval = setInterval(() => {
      remainingTime--;
      $("#workoutRemainingTime").text(remainingTime);

      if (remainingTime <= 0) {
        clearInterval(workoutTimerInterval);
        startRestTimer();
      }
    }, 1000);
  }

  function startRestTimer() {
    let remainingRestTime = restDuration;
    updateDisplay("Rest", restDuration, "rest");

    restTimerInterval = setInterval(() => {
      remainingRestTime--;
      $("#restRemainingTime").text(remainingRestTime);

      if (remainingRestTime <= 0) {
        clearInterval(restTimerInterval);
        currentIndex++;
        if (currentIndex >= workOutNames.length) {
          alert("Workout Complete!");
          return;
        }
        startWorkoutTimer();
      }
    }, 1000);
  }

  function updateDisplay(workoutName, duration, type) {
    if (type === "workout") {
      $("#currWorkout").text(`${workoutName}`);
      $("#currDuration").text(`${duration} seconds`);
      $("#workoutRemainingTime").text(duration);
      $("#restRemainingTime").text(0);
    } else {
      $("#currWorkout").text("Rest");
      $("#currDuration").text(`${duration} seconds`);
      $("#workoutRemainingTime").text(0);
      $("#restRemainingTime").text(duration);
    }
    $("tr").removeClass("active");
    $(`tr[data-index=${currentIndex}]`).addClass("active");
  }

  $(document).on("click", ".startFromHere", function () {
    currentIndex = $(this).closest("tr").data("index");
    startWorkoutTimer();
  });

  $("#startTimer").on("click", startWorkoutTimer);

  populateTable();
});
``

  
  </script>
</body>
</html>
