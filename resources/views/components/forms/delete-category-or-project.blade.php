<form action="{{url('/categories/delete')}}" method="POST">
    @csrf
    <input type="hidden" name="id" id="idForDeletion" value=""/>
    <x-button>Usun</x-button>

</form>
