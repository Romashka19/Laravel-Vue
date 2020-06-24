<template>
    <div class="main-content-block">
        <div class="menu-list">
            <div class="select-food">
                <button class="select" v-on:click="all">All</button>
                <button class="select" v-on:click="salads">Salads</button>
                <button class="select" >Hot meals</button>
                <button class="select" >Snacks</button>
                <button class="select" >Beverages</button>
            </div>
            <div class="under-line"></div>
            <div class="menu-content">
                <p class="title-food">Hot meals</p>
                <div class="under-line"></div>

                <div v-for="menu in product" class="dish-name">
                    <div class="name-price">
                        <p class="name">{{ menu.name }}</p>
                        <p class="price">{{ menu.price }}$</p>
                    </div>
                    <div class="about">
                        <p class="discription">{{ menu.discription }}</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'data',
        ],
        data(){
            return{
                product:[],
                filters:[],
                type:[
                    {}
                ]
            }
        },
        mounted() {
            let food = this.product;
            for(let i = 0;i<this.data.length;i++){
                if(this.data[i].relate_food == 'menu'){
                    food.push(this.data[i]);
                }
            }
        },
        methods:{
            all: function (event) {
                return this.product;
            },
            salads: function (event) {
                for(let i = 0;i<this.data.length;i++){
                    if(this.data[i].type_food == 'salad'){
                        return this.product;
                    }
                }
            }
        }
    }
</script>
