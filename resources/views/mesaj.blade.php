@extends('layout.bilgi')
@section('logo')
    <img src="/img/{{ $data->SIRKETNO }}.png" style="height:54px" class="d-inline-block align-top" alt="" />
    <span class="ml-10 text-xl tracking-tight font-sans text-4xl">{{ $data->KISAAD }}</span>
@endsection
@section('baslik','Bilgi Formu')

@section('icerik')
<div class="w-full max-w-md" id='bilgi'>
    <div v-if='gonderildi==1' class="bg-blue-lightest border-t border-b border-blue text-blue-dark px-4 py-3" role="alert">
        <p class="font-bold">Bilgi</p>
        <p class="text-sm">Mesajınız gönderildi!</p>
    </div>
    <form v-else class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method='POST' action='/mesaj' @submit.prevent="onSubmit">
        <input type='hidden' name='tip' value='{{ $tip }}' />
        <div class="mb-2">
            <label class="block text-grey-darker text-sm font-bold mb-2" for="mesajiniz">
                Mesajınız
            </label>
            <textarea v-model='mesaj' class="shadow appearance-none w-full border rounded py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline"
            id="mesajiniz" placeholder="Mesajınız"></textarea>
        </div>
        <div>
        <button type="submit" class="flex-no-shrink bg-teal hover:bg-teal-dark border-teal hover:border-teal-dark text-sm border-4 text-white py-1 px-2 rounded">Gönder</button>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
var vue = new Vue({
    el:'#bilgi',
    data:{
        gonderildi:0,
        id:'{!! $id !!}',
        mesaj:'',
        tip:'{!! $tip !!}'
    },
    methods:{
        onSubmit(){
            self=this;
            if(this.id!='' && this.mesaj !=''){
                axios.post('/mesaj',{id:this.id, mesaj:this.mesaj, tip:this.tip})
                    .then(function(response){
                        if(response.data.status == 1){
                            self.gonderildi = 1;
                        }
                    })
            }
        }
    }
})

</script>
@endsection