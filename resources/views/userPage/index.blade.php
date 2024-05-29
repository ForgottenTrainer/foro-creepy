@extends('layout')

@section('titulo')
    Usuario {{ $user->name }}
@endsection

<style>
    .info-item a {
    display: block;
    width: 100%;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    word-wrap: break-word; /* Asegura que las palabras largas se corten y no se desborden */
    }

    .info-item {
        max-width: 100%; /* Asegura que el contenedor no se expanda más allá del ancho permitido */
    }
    .cover-bg {
        position: relative;
        height: 300px;
        background-color: #e6e6e6;
    }
    .cover-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .avatar {
        position: absolute;
        bottom: -50px;
        left: 50%;
        transform: translateX(-50%);
        text-align: center;
    }
    .avatar-image {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        border: 4px solid white;
    }
    .avatar-button {
        position: absolute;
        bottom: 0;
        right: 0;
        background: white;
        border-radius: 50%;
        padding: 5px;
        cursor: pointer;
    }
    .cover-overlay {
        position: absolute;
        top: 0;
        right: 0;
        padding: 10px;
        cursor: pointer;
    }
    .cover-edit {
        display: flex;
        align-items: center;
        cursor: pointer;
    }
    .cover-edit span {
        margin-left: 5px;
    }
    .info-card, .post-card {
        border: 1px solid #e6e6e6;
        border-radius: 5px;
        margin-bottom: 20px;
    }
    .info-card-header, .post-card-header {
        padding: 10px 20px;
        border-bottom: 1px solid #e6e6e6;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
    }
    .info-item, .photo-item {
        padding: 10px 20px;
        border-bottom: 1px solid #e6e6e6;
    }
    .info-item:last-child, .photo-item:last-child {
        border-bottom: none;
    }
    .photo-gallery {
        display: flex;
        flex-wrap: wrap;
    }
    .photo-gallery img {
        width: 48%;
        margin: 1%;
        border-radius: 5px;
    }
    .post-card-body {
        padding: 20px;
    }
    .post-footer {
        display: flex;
        justify-content: space-between;
        padding: 10px 20px;
        border-top: 1px solid #e6e6e6;
    }
    .post-actions {
        display: flex;
        gap: 10px;
    }
    .info-card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
</style>

@section('contenido')

<section class="section">
    <div class="container">
        <div class="box">
            <div class="cover-bg">
                <img class="cover-image" src="https://images.unsplash.com/photo-1714547808419-dcee89c7d508?q=80&w=1932&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Cover Image">
                <div class="avatar">
                    <figure>
                        <img src="
                        @if($user->avatar)
                            {{ asset($user->avatar) }}
                        @else
                            https://images.unsplash.com/photo-1539548748613-cbb5c997f604?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D
                        @endif
                        " class="avatar-image" alt="User {{ $user->name }}">
                    </figure>
                </div>
            </div>
            <div class="has-text-centered" style="margin-top: 60px;">
                <h2 class="title is-4">{{ $user->name }}</h2>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="columns">
            <div class="column is-one-quarter">
                <div class="info-card">
                    <div class="info-card-header">
                        <h2 class="title is-5">Redes Sociales</h2>
                        @if ($authUserId == $user->id)
                            @php
                                $hasSocial = $social->where('id_profile', $user->id)->isNotEmpty();
                            @endphp
                            @if ($hasSocial)
                                <button class="" id="editModalButton">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 25px;">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                    </svg>
                                </button>
                            @else
                                <button class="" id="openModalButton">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 25px;">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                </button>
                            @endif
                        @endif
                    </div>
                    @foreach ($social as $i)
                        @if ($i->id_profile == $user->id)
                            <div class="info-item">
                                <p><strong>Instagram</strong></p>
                                <a href="{{ $i->instagram }}"> {{ $i->instagram }} </a>
                            </div>
                            <div class="info-item">
                                <p><strong>Youtube</strong></p>
                                <a href="{{ $i->youtube }}">{{ $i->youtube }}</a>
                            </div>
                            <div class="info-item">
                                <p><strong>Discord</strong></p>
                                <a href="{{ $i->discord }}">{{ $i->discord }}</a>
                            </div>
                            <div class="info-item">
                                <p><strong>Página web</strong></p>
                                <a href="{{ $i->web }}">{{ $i->web }}</a>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="column">
                <div class="post-card-header">
                    <h2 class="title is-5">Historias</h2>
                </div>
                @foreach ($post as $i)
                    @if ($i->id_perfil == $user->id)
                        <div class="post-card">
                            <div class="post-card-body">
                                <div class="media">
                                    <figure class="media-left">
                                        <p class="image is-48x48">
                                            <img src="{{ asset($user->avatar) }}" alt="User">
                                        </p>
                                    </figure>
                                    <div class="media-content">
                                        <p><strong>{{ $user->name }}</strong></p>
                                        <p><small>{{ $i->created_at }}</small></p>
                                        <h3 class="title is-5">{{ $i->titulo }}</h3>
                                    </div>
                                </div>
                                <figure class="image">
                                    @if ($i->image)
                                        <img src="{{ asset($i->image) }}" alt="Post Image">
                                    @else
                                        <img src="https://images.unsplash.com/photo-1516903022779-81a73028310f?q=80&w=1927&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Post Image">
                                    @endif
                                </figure>
                            </div>
                            <div class="post-footer">
                                <div class="post-actions">
                                    <p class="level-item" aria-label="like">
                                        @foreach ($comentario as $item)
                                            @if($i->id == $item->id_post)
                                            
                                                @foreach ($users as $ite)  

                                                    @if ($item->id_user1 == $ite->id)
                                                        <a href="{{ route('index.profile', $ite->id) }}" class="m-2"> @ {{ $ite->name }} </a>
                                                    @endif
                                                
                                                @endforeach

                                                {{ $item->comentario }} 
                                            @endif
                                        @endforeach
                                    </p>
                                </div>
                            </div>
                            <div class="post-footer">
                                <div class="post-actions">
                                    <a class="level-item" aria-label="like">
                                        <a href="{{ route('posts.show', $i->id) }}">Ver creepypasta</a>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</section>

<div class="modal" id="myModal">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">Redes Sociales</p>
            <button class="delete" aria-label="close" id="closeMyModal"></button>
        </header>
        <section class="modal-card-body">
            <form action="{{ route('store.social') }}" method="POST">
                @csrf
                <div class="field">
                    <label class="label">Instagram</label>
                    <div class="control">
                        <input class="input" type="text" placeholder="Instagram URL" name="instagram" value="">
                    </div>
                </div>
                <div class="field">
                    <label class="label">YouTube</label>
                    <div class="control">
                        <input class="input" type="text" placeholder="YouTube URL" name="youtube" value="">
                    </div>
                </div>
                <div class="field">
                    <label class="label">Discord</label>
                    <div class="control">
                        <input class="input" type="text" placeholder="Discord ID" name="discord" value="">
                    </div>
                </div>
                <div class="field">
                    <label class="label">Página web</label>
                    <div class="control">
                        <input class="input" type="text" placeholder="Website URL" name="website" value="">
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <button type="submit" class="button is-primary">Guardar</button>
                    </div>
                </div>
            </form>
        </section>
    </div>
</div>

<!-- Edit Modal -->

<div class="modal" id="editModal">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">Editar Redes Sociales</p>
            <button class="delete" aria-label="close" id="closeEditModal"></button>
        </header>
        <section class="modal-card-body">
            @foreach ($social as $i)
                @if ($i->id_profile == $user->id)
            <form action="{{ route('update.social', $i->id ) }}" method="POST">
                @csrf
                @method('PATCH')
                    <div class="field">
                        <label class="label">Instagram</label>
                        <div class="control">
                            <input class="input" type="text" placeholder="Instagram URL" name="instagram" value="{{ $i->instagram }}">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">YouTube</label>
                        <div class="control">
                            <input class="input" type="text" placeholder="YouTube URL" name="youtube" value="{{ $i->youtube }}">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Discord</label>
                        <div class="control">
                            <input class="input" type="text" placeholder="Discord ID" name="discord" value="{{ $i->discord }}">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Página web</label>
                        <div class="control">
                            <input class="input" type="text" placeholder="Website URL" name="website" value="{{ $i->web }}">
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <button type="submit" class="button is-primary">Guardar</button>
                        </div>
                    </div>
                    @endif
                @endforeach
            </form>
        </section>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Get the modals
        const myModal = document.getElementById('myModal');
        const editModal = document.getElementById('editModal');

        // Get the buttons that open the modals
        const openMyModalButton = document.getElementById('openModalButton');
        const openEditModalButton = document.getElementById('editModalButton');

        // Get the buttons that close the modals
        const closeModalButtons = document.querySelectorAll('#closeMyModal, #closeEditModal');

        // When the user clicks the button, open the modal
        if (openMyModalButton) {
            openMyModalButton.addEventListener('click', () => {
                myModal.classList.add('is-active');
            });
        }

        if (openEditModalButton) {
            openEditModalButton.addEventListener('click', () => {
                editModal.classList.add('is-active');
            });
        }

        // When the user clicks on any close button, close the modal
        closeModalButtons.forEach(button => {
            button.addEventListener('click', () => {
                myModal.classList.remove('is-active');
                editModal.classList.remove('is-active');
            });
        });
    });
</script>

@endsection
