<x-base>
    <x-slot:title>
        {{ $group->name }}
    </x-slot:title>

    <x-slot:styles>
        @vite('resources/css/groups/group.css')
        @vite('resources/css/components/sidebar.css')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    </x-slot:styles>

    <div class="container">
        <x-sidebar />
        <div style="display: flex; align-content: center; flex-wrap: wrap;">
            <section class="group-info">
                <div class="group-image">
                    <img src="{{$group->img}}" alt="Group Image">
                </div>
                <div class="group-details">
                    <h1> {{$group->name}} </h1>
                    <p>{{$group->description}}</p>
                    <button>Join Group</button>
                    <button id="info-btn">Подробная информация</button>
                    <p>Количество участников: <span id="member-count">{{$group->followers}}</span></p>
                </div>
            </section>
            <section class="group-content">
                <div class="add-post">
                    <a href="{{ Route('create_post', ['id' => $group->id]) }}"> <button>Add Post</button> </a>
                </div>
                <h2>Recent Posts</h2>

                @foreach ($posts as $post)

                    @php
                        $lenComments = count($post->comments);
                        $lenImages = count($post->images)
                    @endphp


                    <div class="post">
                        <div class="post-header">
                            <img src="{{$group->img}}" alt="Group Avatar">
                            <div class="post-info">
                                <p class="post-author">{{$group->name}}</p>
                                <p class="post-time">2 hours ago</p>
                            </div>
                        </div>
                        <p class="post-text">{{$post->text}}</p>
                        
                        @if($lenImages > 0)
                            <div class="post-images">
                                <img id="post-img" src="{{$post->images[0]->urn}}" alt="Post Image">
                                <!-- Дополнительные фотографии -->
                                <div class="additional-photos" style="display: none;">
                                @for ($i = 1; $i < $lenImages; $i++)
                                    <img id="post-img" src="{{$post->images[$i]->urn}}" alt="Additional Image 1">
                                @endfor
                                </div>
                                <!-- Кнопка для просмотра дополнительных фотографий -->
                                @if($lenImages > 1)
                                    <button class="view-photos-btn" data-len-images="{{$lenImages - 1}}">Показать еще {{$lenImages - 1}}</button>
                                @endif
                            </div>
                        @endif

                        <div class="comments">
                            <h3>
                                Comments
                                <button class="hide-comments-btn hidden">-</button>
                            </h3>

                            <ul id="comment-list" data-len-comments="{{$lenComments}}" class="comment-list">
                            @if($lenComments > 0)
                                <!-- Первый комментарий виден всегда -->
                                <li>
                                    <img src="commenter-avatar.jpg" alt="Commenter Avatar">
                                    <p id="comment-text" class="comment-text">{{$post->comments[0]->text}}</p>
                                </li>
                                <!-- Остальные комментарии скрыты -->
                                <div class="hidden-comments" style="display: none;">
                                @for ($i = 1; $i < $lenComments; $i++)
                                    <li>
                                        <img src="commenter-avatar.jpg" alt="Commenter Avatar">
                                        <p class="comment-text">{{$post->comments[$i]->text}}</p>
                                    </li>
                                @endfor
                                </div>
                                
                                @if($lenComments > 1)
                                    <!-- Кнопка для отображения скрытых комментариев -->
                                    <button class="show-comments-btn" data-len-comments="{{$lenComments - 1}}">Показать еще {{$lenComments - 1}}</button>
                                @endif
                            @endif
                            </ul>

                            <!-- Поле для добавления нового комментария -->
                            <div class="add-comment">
                                <form id="comment-form" action="{{ Route('create_comment', ['group_id' => $group->id, 'post_id' => $post->id]) }}" method="post">
                                    @csrf
                                    <div class="comment-input">
                                        <input id="comment-input" type="text" name="text" placeholder="Write a comment...">
                                        <button type="submit"><i class="fas fa-paper-plane"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>

                                    
                    </div>

                    <hr>
                
                @endforeach

            </section>
        </div>
    </div>

    <div class="popup" id="popup">
        <div class="popup-content">
            <span class="close" id="close">&times;</span>
            <h2>Дополнительная информация</h2>
            <p>Расширенное описание группы и список участников...</p>
            <p>Количество участников: <span id="member-count">1000</span></p>
        </div>
    </div>

    <div class="overlay" id="overlay">
        <img id="overlay-img" alt="overlay img">
    </div>
    
    <x-slot:scripts>
        @vite('resources/js/pop-up.js')
        @vite('resources/js/show-hide.js')
        @vite('resources/js/add-comments.js')
        @vite('resources/js/img-overlay.js')
    </x-slot:scripts>

</x-base>