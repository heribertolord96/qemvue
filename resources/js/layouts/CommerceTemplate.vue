<template>
<div class="card">
    <div class="card-header">
<li><router-link :to="{name: 'commerces'}">Commerces</router-link></li>
    </div>
    <commerces></commerces>
    <div class="card-body">
<transition name="slide-fade" mode="out-in">
			<router-view :key="$route.fullPath"></router-view>
		</transition>
    </div>
</div>
  
</template>
