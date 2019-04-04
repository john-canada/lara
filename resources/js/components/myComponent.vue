<template>
    <div class="container mt-5">
        <div class="row justify-content-center">
                <div class="col-md-4">
                        <form class="mt-5" @submit.prevent="addArticle">
                        <div class="form-group ">    
                            <input type="text" v-model="article.title" class="form-control" placeholder="Enter Title">
                        </div>

                        <div class="form-group">
                            <textarea class="form-control" placeholder="Enter Title" v-model="article.body"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        <!-- <div class="fb mt-5">
                            <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FLandAsia.Ph%2F&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=181131025808621" width="340" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                        </div> -->
                </div>

            <div class="col-md-8">
            
                <div class="card card-default">
                    <div class="card-header mb-2">Articles</div>
                    <div class="card-body">
                        <div v-for="article in articles" v-bind:key="article.id">
                            <h4>{{article.title}}</h4>
                            <p>{{article.body}}</p>
                             <button class="btn btn-danger" @click="fetchDelete(article.id)">Delete</button>
                             <button class="btn btn-warning" @click="fetchEdit(article)">Edit</button>
                                <hr>
                        </div>
                    
                    </div>
                </div>
            </div>
                <nav aria-label="Page navigation example">
                <ul class="pagination mt-2">
                    <li v-bind:class="[{disabled:!pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchArticle(pagination.prev_page_url)">Previous</a></li>
                    <li class="page-item disabled"><a class="page-link" href="#">Page {{pagination.current_page}} of {{pagination.last_page}}</a></li>
                    <li v-bind:class="[{disabled:!pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchArticle(pagination.next_page_url)">Next</a></li>
                </ul>
                </nav>
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
                page_url = page_url ||'api/articles'; 
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
            },

            fetchDelete(id){
                    if(confirm('Are you sure ?')){
                       fetch(`api/article/${id}`,{
                           method:'delete'   
                        })
                    //    .then(res=>res.JSON())
                    //    .then(res=>{
                           this.fetchArticle();
                        //   alert('article remove');
                        //   }) 
                       //.catch(err=>console.log(err));
                    } 
                   
            },
            addArticle(){
                if(this.edit===false){
                   fetch('api/article',{
                       method:'post',
                       body:JSON.stringify(this.article),
                       headers:{
                           'content-type':'application/json'
                       }
                   })
                   .then(res=>res.JSON)
                   .then(res=>{
                        this.article.title='';
                        this.article.body='';
                      //  alert("article added");
                        this.fetchArticle();
                   });
              
                }else{
                     //update
                      fetch('api/article',{
                       method:'put',
                       body:JSON.stringify(this.article),
                       headers:{
                           'content-type':'application/json'
                       }
                   })
                   .then(res=>res.JSON)
                   .then(res=>{
                        this.article.title='';
                        this.article.body='';
                      //  alert("article updated");
                        this.fetchArticle();
                   });

                }

            },

            fetchEdit(article){
                this.edit=true;
                this.article.id=article.id;
                this.article.article_id=article.id;
                this.article.title=article.title;
                this.article.body=article.body;
            }

        },// end of methods

    }
</script>
