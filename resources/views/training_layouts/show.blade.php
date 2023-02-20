@extends('layouts.layout')
@section('title')
    Training Layouts
@endsection
@section('content')
@section('head-title')
    {{ $layout->name }}
@endsection

<div class="container">
    <div class="row m-auto">
        {{-- category --}}
        <div class="col-lg-6 col-md-12 m-auto mb-5 text-center">
            <div class=" animated--fade-in card text-center border-bottom-info m-auto ">
                <div class="animated--fade-in card-body">
                    <img style="height: 100px; object-fit:contain" class="animated--fade-in card-img-top m-auto"
                        src="{{ url('/', []) }}/uploads/{{ $category->icon }}" alt="category icon">
                    <h5 class=" animated--fade-in card-title ">{{ $category->name }}</h5>
                </div>
            </div>
        </div>
        {{-- category --}}

        {{-- Sections --}}
        <div class="col-lg-12">
            @foreach ($array as $item)

                <div class="row my-2 mt-5 section-row  ">
                    <div class="col-lg-12">
                        <h5 class="d-block">{{$item['section']->name}}</h5>
                    </div>

                    @foreach ($item['exe_list'] as $exe)
                        <div class="col-lg-3 col-xs-6 my-1 text-center" id="exe-ele-{{$exe->id}}">
                            <div class="card text-center">
                                <img class=" animated--fade-in card-img-top m-auto" src="{{url('/' , []).'/uploads/'.$exe->image}}" style="height: 100px; object-fit: contain" alt="">
                                <div class=" animated--fade-in card-body">
                                    <h6 class=" animated--fade-in card-title" >{{$exe->name}}</h6>
                                    <p class=" animated--fade-in card-text ">
                                        <button
                                            section-id="{{$item['section']->id}}"
                                            exe-name="{{$exe->name}}"
                                            exe-id="{{$exe->id}}"
                                            layout-id="{{$layout->id}}"
                                            data-target="#deleteExeModal" type="button" class="btn btn-sm delete-exe" data-toggle="modal" >
                                            <i class="fa fa-trash text-danger"  aria-hidden="true"></i>
                                        </button>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

            @endforeach
        </div>
        {{-- Sections --}}


    </div>
</div>



{{-- Delete Modal --}}
<div class="modal fade" id="deleteExeModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="deleteModalTitle">Confirm Delete</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
                Are You Sure You Want To Delete <span id="delete_exe_name" class="font-weight-bold text-danger"></span> ?
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-danger"
                id="delete-modal-btn"
                section-id=""
                exe-id=""
                delete-route = "{{route('day-layouts.delete_exe')}}"
            >Delete</button>
        </div>
        </div>
    </div>
</div>
{{-- Delete Modal --}}

@section('js')
<script>
            //On Click Delete Button
            $(document).on("click" , ".delete-exe" , function(){
                console.log('delete pressed');
                var id = $(this).attr("exe-id");
                var exe_name = $(this).attr("exe-name");
                var sec_id = $(this).attr("section-id");
                var layout_id = $(this).attr("layout-id");
                $("#delete_exe_name").text(exe_name);
                $("#delete-modal-btn").attr('exe-id' , id);
                $("#delete-modal-btn").attr('section-id' , sec_id);
                $("#delete-modal-btn").attr('layout-id' , layout_id);
            });


            //on click delete modal button
            $(document).on("click" , "#delete-modal-btn" , function(){
                id =$(this).attr('exe-id');
                section_id = $(this).attr('section-id');
                layout_id = $(this).attr('layout-id');
                url =$(this).attr('delete-route');


                console.log('delete 123');
                //Send Ajax Request With The Given Data of Deleted EXE
                $.ajax({
                    url: url,
                    type:"GET",
                    data:{
                        'exercise_id' : id,
                        'section_id' : section_id,
                        'layout_id' : layout_id,
                    },
                    success:function(dataBack)
                    {
                        if(dataBack.success == true)
                        {
                            alert(dataBack.message);
                        }
                        else
                        {
                            alert(dataBack.message);
                        }
                    },
                })



                col = $('#exe-ele-'+id);
                col.remove();
                $('#deleteExeModal').modal('hide');
            });

</script>
@endsection

@endsection


