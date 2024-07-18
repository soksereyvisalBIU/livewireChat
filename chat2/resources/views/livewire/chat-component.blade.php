<div>
    <div class="container">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card chat-app">
                    <div id="plist" class="people-list">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-search"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Search...">
                        </div>
                        <ul class="list-unstyled chat-list mt-2 mb-0">

                            @foreach ($users as $user)
                                @if($user->id != Auth::user()->id)
                                {{ $user->id }}
                                    <li class="clearfix active" wire:click="setReciever({{ $user->id }})">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar">
                                        <div class="about">
                                            <div class="name">{{ $user->name }}</div>
                                            <div class="status"> <i class="fa fa-circle online"></i> online </div>
                                        </div>
                                    </li>
                                @endif
                            @endforeach
                    
                        </ul>
                    </div>

                    @if($reciever_id)
                    <div class="chat">
                        <div class="chat-header clearfix">
                            <div class="row">
                                <div class="col-lg-6">
                                    <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar">
                                    </a>
                                    <div class="chat-about">
                                        <h6 class="m-b-0">Aiden Chavez</h6>
                                        <small>Last seen: 2 hours ago</small>
                                    </div>
                                </div>
                                <div class="col-lg-6 hidden-sm text-right">
                                    <a href="javascript:void(0);" class="btn btn-outline-secondary"><i
                                            class="fa fa-camera"></i></a>
                                    <a href="javascript:void(0);" class="btn btn-outline-primary"><i
                                            class="fa fa-image"></i></a>
                                    <a href="javascript:void(0);" class="btn btn-outline-info"><i
                                            class="fa fa-cogs"></i></a>
                                    <a href="javascript:void(0);" class="btn btn-outline-warning"><i
                                            class="fa fa-question"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="chat-history">
                            <ul class="m-b-0" wire:poll.1s>
                                @if($chat)
                                    @foreach ($chat->messages->reverse() as $message)
                                        <li class="clearfix">
                                            <div class="message-data @if($message->sender == Auth::user()->id) text-end @endif">
                                                <span class="message-data-time">{{ $message->created_at }}</span>
                                            </div>
                                            <div class="message my-message @if($message->sender == Auth::user()->id) other-message float-right @endif">{{ $message->message }}</div>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                        <div class="chat-message clearfix">
                            <form method="POST" wire:submit="sendMessage()" class="input-group mb-0">
                                <input wire:model="message" type="text" class="form-control" placeholder="Enter text here...">
                                <div class="input-group-prepend">
                                    <button class="input-group-text btn btn-primary"><i class="fa fa-send"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
