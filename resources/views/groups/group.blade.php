<x-base>
    <x-slot:title>
        {{ $group->name }}
    </x-slot:title>



    <section class="group-info">
        <div class="group-image">
            <img src="group-image.jpg" alt="Group Image">
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

            <div class="post">
                <div class="post-header">
                    <img src="user-avatar.jpg" alt="Group Avatar">
                    <div class="post-info">
                        <p class="post-author">{{$group->name}}</p>
                        <p class="post-time">2 hours ago</p>
                    </div>
                </div>
                <p class="post-text">{{$post->text}}</p>


                <div class="comments">
                    <h3>
                        Comments
                        <button class="hide-comments-btn hidden">-</button>
                    </h3>
                    @if(count($post->comments) > 0)
                    <ul class="comment-list">
                        <!-- Первый комментарий виден всегда -->
                        <li>
                            <img src="commenter-avatar.jpg" alt="Commenter Avatar">
                            <p class="comment-text">{{$post->comments[0]->text}}</p>
                        </li>
                        <!-- Остальные комментарии скрыты -->
                        <div class="hidden-comments" style="display: none;">
                        @php
                            $len = count($post->comments)
                        @endphp
                        @for ($i = 1; $i < $len; $i++)
                            <li>
                                <img src="commenter-avatar.jpg" alt="Commenter Avatar">
                                <p class="comment-text">{{$post->comments[$i]->text}}</p>
                            </li>
                        @endfor
                        </div>

                        <!-- Кнопка для отображения скрытых комментариев -->
                        <button class="show-comments-btn">Show</button>
                    </ul>
                    @endif
                    <!-- Поле для добавления нового комментария -->
                    <div class="add-comment">
                        <form action="{{ Route('create_comment', ['group_id' => $group->id, 'post_id' => $post->id]) }}" method="post">
                            @csrf
                            <input type="text" name="text" placeholder="Write a comment...">
                            <button type="submit">Add Comment</button>
                        </form>
                    </div>
                </div>

                            
            </div>

            <hr>
        
        @endforeach

        <!-- More posts can go here -->
    </section>

    <div class="popup" id="popup">
        <div class="popup-content">
            <span class="close" id="close">&times;</span>
            <h2>Дополнительная информация</h2>
            <p>Расширенное описание группы и список участников...</p>
            <p>Количество участников: <span id="member-count">1000</span></p>
        </div>
    </div>
    


</x-base>