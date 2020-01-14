@extends("theme/lte/layout")
 @section('vue_container')
 <template v-if="menu==11" >
        <style1> </style1>
</template>
<template v-if="menu==4">
    <my_commerces> </my_commerces>
</template>
<!--Administrar-->

<template v-if="menu==0">
    <commerces> </commerces>
</template>

<template v-if="menu==1">
    <products> </products>
</template>
<template v-if="menu==2">
    <promociones> </promociones>
</template>
<template v-if="menu==3">
    <eventos> </eventos>
</template>
<template v-if="menu==5">
    <show_commerce> </show_commerce>
</template>
<!--Explorar-->

<!-- /.card -->

@endsection