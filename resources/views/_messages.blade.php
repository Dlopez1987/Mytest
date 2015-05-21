@if( $errors->any())
    @foreach($errors->all() as $error)
        @if(!is_null($error) or !empty($error))
            <script>
                $('document').ready(function () {
                    var n = noty(
                            {
                                layout: 'topRight',
                                text: '{{ $error }}',
                                type: 'error',
                                theme: 'bootstrap',
                                animation: {
                                    open: 'animated bounceInRight', // Animate.css class names
                                    close: 'animated bounceOutRight', // Animate.css class names
                                    easing: 'swing', // easing
                                    speed: 500 // opening & closing animation speed
                                }
                            }
                    );
                });

            </script>
        @endif
    @endforeach
@endif

@if(!empty($messages))
    <script>
        @foreach($messages as $type => $messageBag)
        @if(!empty($messageBag))
        @foreach($messageBag as $message)
        $('document').ready(function () {
            var n = noty(
                    {
                        layout: 'topRight',
                        text: '{{ $message }}',
                        type: '{{ $type }}',
                        theme: 'bootstrap',
                        animation: {
                            open: 'animated bounceInRight', // Animate.css class names
                            close: 'animated bounceOutRight', // Animate.css class names
                            easing: 'swing', // easing
                            speed: 500 // opening & closing animation speed
                        }
                    }
            );
        });
        @endforeach
        @endif
        @endforeach
    </script>
@endif