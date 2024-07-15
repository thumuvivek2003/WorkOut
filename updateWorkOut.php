


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.9">
    <title>Workout Plan Editor</title>
    <link rel="stylesheet" href="updateWorkOut.css">
</head>
<body>
    <div class="container">
        <h1>Workout Editor</h1>
        <div style='display:flex'>
            <button id="addWorkout" style='margin-left:6x' class="button-49" role="button">
              <span class="text">Add Workout</span>
            </button>
            <button id="addSeconds" style='margin-left:6px' class="button-49" role="button">
              <span class="text">+5 Seconds</span>
            </button>
            <button id="minusSeconds" style='margin-left:6px' class="button-49" role="button">
              <span class="text">-5 Seconds</span>
            </button>
        </div>
        <div style='overflow-x:scroll'>
            <table class="workout-table">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Duration (mins)</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody id="workoutTableBody">
                </tbody>
            </table>
        </div>
        <button id="resetAll" style='width:100%' class="button-55" role="button">
          <span class="text">Reset All</span>
        </button>


        <!-- Modal -->
        <div id="modal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2 id="modalTitle">Edit Workout</h2>
                <label for="workoutName">Name:</label>
                <input type="text" id="workoutName" class="input-field"><br><br>
                <label for="workoutDuration">Duration:</label>
                <input type="number" id="workoutDuration" class="input-field"><br><br>
                <button id="updateWorkout" class="primary-button">Update</button>
            </div>
        </div>
    </div>
    <!--<script src='updateWorkOut.js'></script>-->
    <script>
        
        
    // Default workout data
    let workOutNames = [];
    let workOutDurations = [];
    let workOutData = [];
    
    if (localStorage.getItem('workOutData')) {
        workOutData = JSON.parse(localStorage.getItem('workOutData'));
        workOutNames = workOutData.map(workout => workout.workOutName);
        workOutDurations = workOutData.map(workout => workout.workOutDuration);
    } else {
        workOutNames = ["Jumping Jack", "Leg Raises", "Flutter Kicks", "Scissor Kicks", "Feet Off Crunches", "Plank Knee To Elbow", "Jumping Climber", "Alternate V Sit Up", "Hollow Hold"];
        workOutDurations = new Array(10).fill(45);
        workOutData = workOutNames.map((name, index) => ({
            workOutName: name,
            workOutDuration: workOutDurations[index]
        }));
        
        localStorage.setItem('workOutData', JSON.stringify(workOutData));
    }
    
    
    const workoutTableBody = document.getElementById('workoutTableBody');
    const modal = document.getElementById('modal');
    const closeModal = document.getElementsByClassName('close')[0];
    const addWorkoutButton = document.getElementById('addWorkout');
    const updateWorkoutButton = document.getElementById('updateWorkout');
    let editIndex = null;
    
    // Render table
    function renderTable() {
        workoutTableBody.innerHTML = '';
        workOutData.forEach((workout, index) => {
            workoutTableBody.innerHTML += `
                <tr>
                    <td>${index + 1}</td>
                    <td>
                        <button class="button-45" role="button">
                              <span class="text">${workout.workOutName}</span>
                        </button>
                    </td>
                    <td>
                        <button class="button-46" role="button">
                              <span class="text">${workout.workOutDuration}</span>
                        </button>
                    </td>
                    <td><button class="button-71" role="button" onclick="editWorkout(${index})">E</button></td>
                    <td><button class="button-82-pushable" role="button" onclick="deleteWorkout(${index})">
                          <span class="button-82-shadow"></span>
                          <span class="button-82-edge"></span>
                          <span class="button-82-front text">
                            D
                          </span>
                        </button>
                    </td>
                </tr>
            `;
        });
    }
    
    // Edit workout
    window.editWorkout = function(index) {
        editIndex = index;
        document.getElementById('workoutName').value = workOutData[index].workOutName;
        document.getElementById('workoutDuration').value = workOutData[index].workOutDuration;
        modal.style.display = 'block';
    }
    
    // Delete workout
    window.deleteWorkout = function(index) {
        workOutData.splice(index, 1);
        localStorage.setItem('workOutData', JSON.stringify(workOutData));
        renderTable();
    }
    
    // Close modal
    closeModal.onclick = function() {
        modal.style.display = 'none';
    }
    
    // Update workout
    updateWorkoutButton.onclick = function() {
        const name = document.getElementById('workoutName').value;
        const duration = document.getElementById('workoutDuration').value;
    
        if (editIndex !== null) {
            workOutData[editIndex] = { workOutName: name, workOutDuration: Number(duration) };
        } else {
            workOutData.push({ workOutName: name, workOutDuration: Number(duration) });
        }
    
        localStorage.setItem('workOutData', JSON.stringify(workOutData));
        renderTable();
        modal.style.display = 'none';
        editIndex = null;
    }
    
    // Add workout
    addWorkoutButton.onclick = function() {
        editIndex = null;
        document.getElementById('workoutName').value = '';
        document.getElementById('workoutDuration').value = '';
        modal.style.display = 'block';
    }
    
    // Render initial table
    renderTable();
    
    // Close modal when clicking outside of it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    }
    
    // Select the resetAll button
    const resetAllButton = document.getElementById('resetAll');
    
    // Reset All workouts
    resetAllButton.onclick = function() {
        localStorage.removeItem('workOutData');
        location.reload();
    }
    
    
    
    document.getElementById('addSeconds').addEventListener('click', function() {
        let workoutData = JSON.parse(localStorage.getItem('workOutData')) || [];
    
        workoutData.forEach(function(workout) {
            workout.workOutDuration += 5;
        });
    
        localStorage.setItem('workOutData', JSON.stringify(workoutData));
        location.reload();
    });
    
    
    document.getElementById('minusSeconds').addEventListener('click', function() {
        let workoutData = JSON.parse(localStorage.getItem('workOutData')) || [];
    
        workoutData.forEach(function(workout) {
            workout.workOutDuration -= 5;
        });
    
        localStorage.setItem('workOutData', JSON.stringify(workoutData));
        location.reload();
    });
    
    
    
    
    </script>

</body>
</html>
