<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {'packages':['table']});
  google.charts.setOnLoadCallback(drawTable);

  function drawTable() {

    //dodać coś jak pusta ta bela
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Name');
    data.addColumn('string', 'Edit');
    data.addColumn('string', 'Delete');

    var tableData = @json($dataArrayWithProjectsOrCategories);

    tableData.forEach(addRow);


    function addRow(item) {
        var deleteIcon = "<svg xmlns='http://www.w3.org/2000/svg' class='h-6 w-6' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16' /></svg>";
        data.addRows([
            [item.name, 'Edit', "<button onclick='sendDataToDeleteModal(this)'id='"+item.id +"' value='"+item.name +"' x-on:click='open = ! open'>"+deleteIcon+"</button>"]
        ]);
    }


    var table = new google.visualization.Table(document.getElementById('table_div'));

    table.draw(data, {allowHtml: true, showRowNumber: true, width: '100%'});
  }

  function sendDataToDeleteModal(element){
    document.getElementById('idForDeletion').value=element.id;
    document.getElementById("tutajTest").innerHTML = element.value;
  };
</script>


<div x-data='{open: false}'>
<div>
            <!--
                @if ($type=='categories')
                    mamy kategorie
                @elseif($type=='projects')
                    Nie mamy
                @else
                    No to nic
                @endif


            @foreach ( $dataArrayWithProjectsOrCategories as $category )
                <div>{{$category->categoryName}}</div>
            @endforeach
            -->

    <div class="flex justify-center">
        <div class="w-5/6" id="table_div"></div>
    </div>


</div>

    <div x-show="open" >
        <x-modals.delete-category-or-project/>
    </div>
</div>
