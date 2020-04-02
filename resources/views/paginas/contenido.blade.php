@extends('layouts.app')

@section('contenido')

<template v-if="contenido == 0">
  @include('paginas.principal')
</template>

<template v-if='contenido == 1'>
  @include('paginas.principal')
</template>

<template v-if='contenido == 2'>
  @include('auth.registro')
</template>

@endsection