@extends('layouts.docu')

@section('docu')
    <div class="card mb-3">
        <div class="card-header">Job Postings</div>
        <div class="card-body">
            <strong>INTRODUCTION</strong><br/>
            <p>
                This resource...
            </p>

            <strong>ALLOWED REQUESTS</strong><br/>
            <table class="table mt-1">
                <thead class="thead-light">
                <tr>
                    <th>Verb</th>
                    <th>Path</th>
                    <th>Action</th>
                    <th>Description</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>GET</td>
                    <td><code class=" language-php">
                            <span class="token operator">/</span>api<span class="token operator">/</span>v1<span class="token operator">/</span>jobposting
                        </code></td>
                    <td>index</td>
                    <td></td>
                </tr>
                <tr>
                    <td>POST</td>
                    <td><code class=" language-php">
                            <span class="token operator">/</span>api<span class="token operator">/</span>v1<span class="token operator">/</span>jobposting
                        </code></td>
                    <td>store</td>
                    <td></td>
                </tr>
                <tr>
                    <td>GET</td>
                    <td><code class=" language-php">
                            <span class="token operator">/</span>api<span class="token operator">/</span>v1<span class="token operator">/</span>jobposting<span class="token operator">/</span><span class="token punctuation">{</span>jobposting<span class="token punctuation">}</span>
                        </code></td>
                    <td>show</td>
                    <td></td>
                </tr>
                <tr>
                    <td>PUT/PATCH</td>
                    <td><code class=" language-php">
                            <span class="token operator">/</span>api<span class="token operator">/</span>v1<span class="token operator">/</span>jobposting<span class="token operator">/</span><span class="token punctuation">{</span>jobposting<span class="token punctuation">}</span>
                        </code></td>
                    <td>update</td>
                    <td></td>
                </tr>
                <tr>
                    <td>DELETE</td>
                    <td><code class=" language-php">
                            <span class="token operator">/</span>api<span class="token operator">/</span>v1<span class="token operator">/</span>jobposting<span class="token operator">/</span><span class="token punctuation">{</span>jobposting<span class="token punctuation">}</span>
                        </code></td>
                    <td>destroy</td>
                    <td></td>
                </tr>
                </tbody>
            </table>

            <strong>ATTRIBUTES</strong><br/>
            <table class="table mt-1">
                <thead class="thead-light">
                    <tr>
                        <th>Attribute</th>
                        <th>Type</th>
                        <th>Description</th>
                        <th>Filter</th>
                        <th>Sorting</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>id</td>
                        <td>Integer</td>
                        <td>@todo</td>
                        <td>Exact match</td>
                        <td>Allowed</td>
                    </tr>
                    <tr>
                        <td>title</td>
                        <td>String</td>
                        <td>@todo</td>
                        <td>Partil match</td>
                        <td>Allowed</td>
                    </tr>
                </tbody>
            </table>


        </div>
    </div>
@endsection
