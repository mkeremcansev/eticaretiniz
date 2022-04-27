@section('script')
    <script>
        let go_to_payment = $('#go-to-payment')
        go_to_payment.on('click', function(e){
            e.preventDefault()
            go_to_payment.addClass('custom-disabled')
            let adress = $('#adress').val()
            let phone = $('#phone').val()
            $.ajax({
                    method: 'POST',
                    url: '{{ route("web.checkout.store") }}',
                    data: {adress:adress, phone:phone},
                    dataType: 'json',
                    success: function(response){
                        if(response.status == 201){
                            go_to_payment.removeClass('custom-disabled')
                            Swal.fire({
                                text: response.message,
                                icon: 'error',
                                confirmButtonText: '@lang("words.okey")'
                            })
                        } else if(response.status == 200){
                            go_to_payment.addClass('custom-disabled')
                            location.href = '{{ route("web.payment.create") }}'
                        }
                        else if(response.status == 202){
                            Swal.fire({
                                text: response.message,
                                icon: 'error',
                                confirmButtonText: '@lang("words.okey")'
                            }).then((result) => {
                                result.isConfirmed ? location.reload() : location.reload()
                            })
                        }
                        else if(response.status == 203){
                            Swal.fire({
                                text: response.message,
                                icon: 'error',
                                confirmButtonText: '@lang("words.okey")'
                            }).then((result) => {
                                result.isConfirmed ? location.reload() : location.reload()
                            })
                        }
                        else if(response.status == 205){
                            Swal.fire({
                                text: '@lang("words.order_action_success")',
                                icon: 'success',
                                confirmButtonText: '@lang("words.okey")'
                            }).then((result) => {
                                result.isConfirmed ? location.href = '{{ route("web.account.order") }}' : location.href = '{{ route("web.account.order") }}'
                            })
                        }
                    },
                    error: function(response){
                        console.log(response)
                        go_to_payment.removeClass('custom-disabled')
                        Swal.fire({
                            text: getValidateMessage(response),
                            icon: 'error',
                            confirmButtonText: '@lang("words.okey")'
                        })
                    }
                })
        })

        let go_to_coupon = $('#go-to-coupon')
        go_to_coupon.on('click', function(){
            let code = $('#code').val()
            $.ajax({
                    method: 'POST',
                    url: '{{ route("web.coupon.store") }}',
                    data: {code:code},
                    dataType: 'json',
                    success: function(response){
                        if(response.status == 200){
                            Swal.fire({
                                text: response.message,
                                icon: 'success',
                                confirmButtonText: '@lang("words.okey")',
                            }).then((result) => {
                                result.isConfirmed ? location.reload() : location.reload()
                            })
                        } else if(response.status == 201){
                            Swal.fire({
                                text: response.message,
                                icon: 'error',
                                confirmButtonText: '@lang("words.okey")',
                            })
                        }
                        
                    },
                    error: function(response){
                        Swal.fire({
                            text: getValidateMessage(response),
                            icon: 'error',
                            confirmButtonText: '@lang("words.okey")'
                        })
                    }
                })
        })
    </script>
@endsection