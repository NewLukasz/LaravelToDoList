<div>
<!--
    @if ($type=='categories')
        mamy kategorie
    @elseif($type=='projects')
        Nie mamy
    @else
        No to nic
    @endif
-->

@foreach ( $dataArrayWithProjectsOrCategories as $category )
    <div>{{$category->categoryName}}</div>
@endforeach


</div>
