<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li v-bind:class="[{disabled:!pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchArticle(pagination.prev_page_url)">Previous</a></li>
      <li class="page-item disabled"><a class="page-link" href="#">Page {{pagination.current_page}} of {{pagination.last_page}}</a></li>
    <li v-bind:class="[{disabled:!pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchArticle(pagination.next_page_url)">Next</a></li>
  </ul>
</nav>

                <div class="card card-default">
                    <div class="card-header">Articles</div>
                    <div class="card-body">
                        <div v-for="article in articles" v-bind:key="article.id">
                            <h4>{{article.title}}</h4>
                            <p>{{article.body}}</p>
                        </div>
                     <button class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        data(){
           return{
                articles: [],
                article : {
                           'id':'',
                           'title':'',
                           'body':'',
                         },
                         article_id:'',
                         pagination:{},
                         edit:false,

                    }//end of article 

         },// end of data

        created(){
             this.fetchArticle();
        },// end of created

        methods:{
            fetchArticle(page_url){
                let vm = this;
                page_url = page_url ||'api/article'; 
                fetch(page_url)
                .then(res=>res.json())
                .then(res=>{
                    this.articles=res.data;
                    vm.makePagination(res.meta, res.links);
                })
                .catch(err=>console.log(err));
            },
            makePagination(meta, links){
                let pagination = {
                    current_page:meta.current_page,
                    last_page:meta.last_page,
                    next_page_url:links.next,
                    prev_page_url:links.prev,
                }
              this.pagination = pagination;
            }

        },// end of methods

    }
</script>
