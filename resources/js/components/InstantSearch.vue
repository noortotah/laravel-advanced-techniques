
<template>
<div class="container">
    <ais-instant-search
    index-name="posts"
    :search-client="searchClient"
  >

    <ais-search-box 
            placeholder="Search for posts..." 
            autofocus
            submit-title="Search"
            reset-title="Remove the query"
            :class-names="{
              'ais-SearchBox': 'col-6 mx-auto',
              'ais-SearchBox-form': 'form-inline',
              'ais-SearchBox-input': 'form-control col',
              'ais-SearchBox-submit': 'btn btn-primary btn-lg',
              'ais-SearchBox-reset' : 'btn btn-secondary btn-lg'
              }"
    />
    <!-- <ais-hits :transform-items="transformItems" /> -->
    
  <div class="row">
        <ais-hits>

  <div slot-scope="{ items }">
    <div v-for="item in items" :key="item.objectID" class="card text-white mb-2">
      <div class="card-header bg-secondary">
        {{ item.published ? 'Published' : 'Draft' }}
      </div>
      <div class="card-body text-dark">
        <h5 class="card-title">{{ item.title }}</h5>
        <p class="card-text">{{ item.content }}</p>
      </div>
      <div class="card-footer text-muted text-right">
        {{ item.created_at }}
      </div>
    </div>
   
  </div>
</ais-hits>
  </div>
  </ais-instant-search>
</div>
</template>

<script>
  import algoliasearch from 'algoliasearch/lite';

  export default {
    data() {
      return {
        searchClient: algoliasearch(
          'KGZ0A91T8W',
          '4502fde5a621089c9a72e4b42e98cc3a'
        ),
      };
    },

  };
</script>