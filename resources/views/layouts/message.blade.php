 @if ($errors->any())
                                        <div class=" alert alert-warning">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li> <i class="fa fa-exclamation-triangle"></i> {{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                     @if (session()->has('error'))
                                             
                                                    <div class=" alert alert-warning">
                                                        <i class="fa fa-exclamation-triangle"></i> {{session()->get('error')}}
                                                    </div>
                                        @endif
                                        @if (session()->has('success'))
                                             
                                                    <div class=" alert alert-success">
                                                        <i class="fa fa-check"></i> {{session()->get('success')}}
                                                    </div>
                                        @endif