<!-- Deleted inFormation Student -->
<div class="modal fade" id="start_receipt{{$online_classe->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('startLesson.admin','test')}}" method="post">
                    @csrf
                    @method('post')
                    <input type="hidden" name="id" value="{{$online_classe->id}}">
                    <input type="hidden" name="meeting_id" value="{{$online_classe->meeting_id}}">
                    <h5 style="font-family: 'Cairo', sans-serif;">{{ __('My_Classes_trans.start') }}</h5>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('Students_trans.Close')}}</button>
                        <button  class="btn btn-danger">{{trans('Students_trans.submit')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
