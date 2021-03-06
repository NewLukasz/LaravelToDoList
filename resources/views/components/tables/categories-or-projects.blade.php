<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {'packages':['table']});
  google.charts.setOnLoadCallback(drawTable);

  function drawTable() {
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Name');
    data.addColumn('string', 'Edit');
    data.addColumn('string', 'Delete');

    var tableData = @json($dataArrayWithProjectsOrCategories);

    tableData.forEach(addRow);

    function addRow(item) {
        var deleteCell = setDataForDeleteCell(item.name,item.id);
        var editCell = setDataForEditCell(item.name,item.id);
        data.addRows([
            [item.name, editCell, deleteCell]
        ]);
    }

    var table = new google.visualization.Table(document.getElementById('table'));

    table.draw(data, {allowHtml: true, showRowNumber: true, width: '100%'});

  }

  function setDataForDeleteCell(itemName, itemId){
    var deleteIcon = "<svg xmlns='http://www.w3.org/2000/svg' class='h-6 w-6' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16' /></svg>";
    return "<div class='flex justify-center'><button onclick='sendDataToDeleteModal(this)'id='"+itemId+"' name='"+itemName +"' x-on:click='deleteModalVisibility = ! deleteModalVisibility'>"+deleteIcon+"</button></div>";
  };

  function setDataForEditCell(itemName, itemId){
      var editIcon = "<svg xmlns='http://www.w3.org/2000/svg' class='h-6 w-6' fill='none' viewBox='0 0 24 24' stroke='currentColor'> <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z' /></svg>";
      return "<div class='flex justify-center'><button onclick='sendDataToEditModal(this)'id='"+itemId+"' name='"+itemName +"' x-on:click='editModalVisibility = ! editModalVisibility'>"+editIcon+"</button></div>";
  }

  function sendDataToEditModal(element){
    document.getElementById("nameOfEditingThing").innerHTML = element.name;
    document.getElementById('inputName').value=element.name;
    document.getElementById('idForEditon').value=element.id;
    }

  function sendDataToDeleteModal(element){
    document.getElementById('idForDeletion').value=element.id;
    document.getElementById("name").innerHTML = element.name;
  };
</script>

<div x-data='{deleteModalVisibility: false, editModalVisibility : false}'>
    @if(count($dataArrayWithProjectsOrCategories)==0)
        <div class="flex justify-center">
            There are no data please add some.
        </div>
    @else
        <div class="flex justify-center">
            <div class="w-5/6" id="table"></div>
        </div>
    @endif
    <div x-show="deleteModalVisibility">
        <x-modals.delete-category-or-project type="{{$type}}"/>
    </div>
    <div x-show="editModalVisibility">
        <x-modals.edit-category-or-project type="{{$type}}"/>
    </div>
</div>


