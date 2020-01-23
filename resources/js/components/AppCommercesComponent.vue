<template>
<div class="content">
      <div class="panel panel-default-success">
        <div class="card-header with-border">
          <h4 class="panel-title">
        <p>Volver atras
        <router-link class="panel-header" :to="{name: 'commerces'}"></router-link>
        </p>
      </h4>

        </div>
      </div>
  <div >
     <div >
       
        <commerces></commerces>
        </div>
     
    <transition name="slide-fade" mode="out-in">
      <router-view :key="$route.fullPath"></router-view>
    </transition>
  </div>
</div>
</template>