<template>
    <div class="main-content-block">
        <div v-for="food in product" class="product-block">
            <div class="product-image"><img src="img/pizza1.jpeg"/></div>
            <div class="product-info">
                <p class="product-name">{{ food.name }}</p>
                <p class="discription">{{ food.discription }}</p>
                <p class="product-price">{{ food.price }}$</p>
                <button class="green-btn">Buy</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'data'
        ],
        data(){
            return{
                product:[],
                filters:[]
            }
        },
        mounted() {
            let food = this.product;
            for(let i = 0;i<this.data.length;i++){
                if(this.data[i].relate_food == 'online'){
                    food.push(this.data[i]);
                }
            }
        },
        methods:{
        }
    }
</script>
