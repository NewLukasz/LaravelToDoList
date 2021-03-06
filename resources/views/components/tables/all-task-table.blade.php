
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['table']});
    google.charts.setOnLoadCallback(drawTable);

    function sendDataToEditModal(task){
        document.getElementById('idOfTaskForEdit').value=task.id;
    }

    function sendDataToDoneModal(element){
        document.getElementById("nameOfDoneTask").innerHTML = element.name;
        document.getElementById("idOfDoneTask").value = element.id;
    }

    function sendDataToDeleteModal(task){
        document.getElementById("idForDeletion").value=task.id;
        document.getElementById("name").innerHTML=task.name;
    }


    function drawTable() {
    var data = new google.visualization.DataTable();
    data.addColumn('number', '');
    data.addColumn('string', 'Name');
    data.addColumn('string', 'Status');
    data.addColumn('string', 'Priority');
    data.addColumn('string', 'Category');
    data.addColumn('string', 'Project');
    data.addColumn('string', 'Source');
    data.addColumn('string', 'Start Date');
    data.addColumn('string', 'Due Date');
    data.addColumn('string', 'Notes');
    data.addColumn('string', 'Done');
    data.addColumn('string', 'Edit');
    data.addColumn('string', 'Delete');

    var iteration=1;

    @json($tasks).forEach(addRow);

    function addRow(task){
        data.addRows([
            [
            iteration,
            task.name,
            showStatusString(task.statusId),
            showPriorityString(task.prioId),
            getCategoryOrProjectNameBasedOnId(@json($categories),task.categoryId),
            getCategoryOrProjectNameBasedOnId(@json($projects),task.projectId),
            task.source,
            task.startDate,
            task.dueDate,
            checkIfNotesExists(task.notes),
            setDataForDoneCell(task),
            setDataForEditCell(task),
            setDataForDeleteCell(task)
            ]
        ]);
        iteration++;
    }



    function setDataForEditCell(task){
        var editIcon = "<svg xmlns='http://www.w3.org/2000/svg' class='h-6 w-6' fill='none' viewBox='0 0 24 24' stroke='currentColor'> <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z' /></svg>";
        return "<div class='flex justify-center'><button onclick='sendDataToEditModal(this)' id='"+task.id+"' x-on:click='editModalVisibility = ! editModalVisibility'>"+editIcon+"</button></div>";
    };

    function setDataForDeleteCell(task){
        var deleteIcon = "<svg xmlns='http://www.w3.org/2000/svg' class='h-6 w-6' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16' /></svg>";
        return "<div class='flex justify-center'><button onclick='sendDataToDeleteModal(this)' id='"+task.id+"' name='"+task.name+"' x-on:click='deleteModalVisibility = ! deleteModalVisibility'>"+deleteIcon+"</button></div>";
    }

    function setDataForDoneCell(task){
        if(task.statusId!=3){
            var doneIcon = "<svg xmlns='http://www.w3.org/2000/svg' class='h-6 w-6' fill='none' viewBox='0 0 24 24' stroke='currentColor'> <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M5 13l4 4L19 7' /></svg>";
            return "<div class='flex justify-center'><button onclick='sendDataToDoneModal(this)' id='"+task.id+"' name='"+task.name +"' x-on:click='doneModalVisibility = ! doneModalVisibility'>"+doneIcon+"</button></div>";
        }else{
            return "";
        }

    };

    function checkIfNotesExists(notes){
        if(notes){
            return notes;
        }else{
            return "Undefined";
        }
    }



    function showStatusString(statusId){
        switch(statusId){
            case 1:
                return "Not started";
            case 2:
                return "Ongoing";
            case 3:
                return "Completed";
        }
    }

    function showPriorityString(prioId){
        switch(prioId){
            case 1:
                return "Normal";
            case 2:
                return "High";
            case 3:
                return "Critical";
        }
    }

    function getCategoryOrProjectNameBasedOnId(projectsOrCategoriesdataArray, id){
        var name;
        projectsOrCategoriesdataArray.forEach(item=>{
            if(item.id == id){
                name=item.name;
            }
        });
        return name;
    }

    var table = new google.visualization.Table(document.getElementById('table_div'));

    table.draw(data, {allowHtml: true, width: '100%', height: '100%'});
    }
</script>
<div x-data='{doneModalVisibility: false, deleteModalVisibility: false, editModalVisibility : false}'>
    <div id="table_div"></div>
    <div x-show="doneModalVisibility">
        <x-modals.done-task/>
    </div>
    <div x-show="editModalVisibility">
        <x-modals.edit-task :tasks="$tasks" :categories="$categories" :projects="$projects"/>
    </div>
    <div x-show="deleteModalVisibility">
        <x-modals.delete-task/>
    </div>
</div>
