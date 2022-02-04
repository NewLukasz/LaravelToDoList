
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['table']});
    google.charts.setOnLoadCallback(drawTable);


    function sendDataToDoneModal(element){
        document.getElementById("nameOfDoneTask").innerHTML = element.name;
        document.getElementById("idOfDoneTask").value = element.id;
    }


    function drawTable() {
    var data = new google.visualization.DataTable();
    data.addColumn('number', '');
    data.addColumn('string', 'Name');
    data.addColumn('string', 'Status');
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
            getCategoryOrProjectNameBasedOnId(@json($categories),task.categoryId),
            getCategoryOrProjectNameBasedOnId(@json($projects),task.projectId),
            task.source,
            task.startDate,
            task.dueDate,
            checkIfNotesExists(task.notes),
            setDataForDoneCell(task.name,task.id),
            'Edit',
            'Delete'
            ]
        ]);
        iteration++;
    }

    function checkIfNotesExists(notes){
        if(notes){
            return notes;
        }else{
            return "Undefined";
        }
    }

    function setDataForDoneCell(itemName, itemId){
        var doneIcon = "<svg xmlns='http://www.w3.org/2000/svg' class='h-6 w-6' fill='none' viewBox='0 0 24 24' stroke='currentColor'> <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M5 13l4 4L19 7' /></svg>";
        return "<div class='flex justify-center'><button onclick='sendDataToDoneModal(this)' id='"+itemId+"' name='"+itemName +"' x-on:click='doneModalVisibility = ! doneModalVisibility'>"+doneIcon+"</button></div>";
    };

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
</div>
