// script.js
$(document).ready(function () {
  const workoutNames = ["Push-ups", "Squats", "Planks"];
  const workoutDurations = [5, 2, 3]; // durations in seconds
  const restDuration = 2; // rest time between workouts in seconds
  let currentIndex = 0;
  let timerInterval;

  function populateTable() {
    const tbody = $("#workoutTable tbody");
    workoutNames.forEach((name, index) => {
      const duration = workoutDurations[index];
      tbody.append(`
        <tr data-index="${index}">
          <td>${name}</td>
          <td>${duration}</td>
          <td><button class="startFromHere">Start From Here</button></td>
        </tr>
      `);
    });
  }

  function startTimer() {
    clearInterval(timerInterval);
    let currentDuration = workoutDurations[currentIndex];
    updateDisplay(workoutNames[currentIndex], currentDuration);
    let remainingTime = currentDuration;

    timerInterval = setInterval(() => {
      remainingTime--;
      $("#remainingTime").text(remainingTime);

      if (remainingTime <= 0) {
        currentIndex++;
        if (currentIndex >= workoutNames.length) {
          clearInterval(timerInterval);
          alert("Workout Complete!");
          return;
        }
        remainingTime = workoutDurations[currentIndex] + restDuration;
        updateDisplay(workoutNames[currentIndex], workoutDurations[currentIndex]);
      }
    }, 1000);
  }

  function updateDisplay(workoutName, duration) {
    $("#currWorkout").text(`Current Workout: ${workoutName}`);
    $("#currDuration").text(`Current Duration: ${duration} seconds`);
    $("tr").removeClass("active");
    $(`tr[data-index=${currentIndex}]`).addClass("active");
  }

  $(document).on("click", ".startFromHere", function () {
    currentIndex = $(this).closest("tr").data("index");
    startTimer();
  });

  $("#startTimer").on("click", startTimer);

  populateTable();
});
