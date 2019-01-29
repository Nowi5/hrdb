@extends('layouts.docu')

@section('docu')
    <div class="card mb-3">
        <div class="card-header">Fetch Data</div>
        <div class="card-body">
            <p>By default each resource has the following operations. However, not each resource have implemeented all of them.</p>

            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>Verb</th>
                        <th>Path</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>GET</td>
                        <td><code class=" language-php">
                                <span class="token operator">/</span>api<span class="token operator">/</span>v1<span class="token operator">/</span>jobposting
                            </code></td>
                        <td>index</td>
                    </tr>
                    <tr>
                        <td>POST</td>
                        <td><code class=" language-php">
                                <span class="token operator">/</span>api<span class="token operator">/</span>v1<span class="token operator">/</span>jobposting
                            </code></td>
                        <td>store</td>
                    </tr>
                    <tr>
                        <td>GET</td>
                        <td><code class=" language-php">
                                <span class="token operator">/</span>api<span class="token operator">/</span>v1<span class="token operator">/</span>jobposting<span class="token operator">/</span><span class="token punctuation">{</span>jobposting<span class="token punctuation">}</span>
                            </code></td>
                        <td>show</td>

                    </tr>
                    <tr>
                        <td>PUT/PATCH</td>
                        <td><code class=" language-php">
                                <span class="token operator">/</span>api<span class="token operator">/</span>v1<span class="token operator">/</span>jobposting<span class="token operator">/</span><span class="token punctuation">{</span>jobposting<span class="token punctuation">}</span>
                            </code></td>
                        <td>update</td>
                    </tr>
                    <tr>
                        <td>DELETE</td>
                        <td><code class=" language-php">
                                <span class="token operator">/</span>api<span class="token operator">/</span>v1<span class="token operator">/</span>jobposting<span class="token operator">/</span><span class="token punctuation">{</span>jobposting<span class="token punctuation">}</span>
                            </code></td>
                        <td>destroy</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">Sort Data</div>
        <div class="card-body">
            <p>
                The JSON API specification reserves the <code>sort</code> query parameter for
                <a href="https://jsonapi.org/format/1.0/#fetching-sorting">sorting resources</a>,
                by using <a href="https://laravel-json-api.readthedocs.io/en/latest/fetching/sorting/"> this package</a>.
                Sorting allows clients to specify the order in which resources are to be returned in responses.<br/>
                <code class=" language-php">
                    <span class="token operator">/</span>api<span class="token operator">/</span>v1<span class="token operator">/</span>jobposting?sort=created_at
                </code>
            </p>
            <p>
                This request would return jobpostings sorted by title ascending, then created-at ascending:<br/>
                <code class=" language-php">
                    <span class="token operator">/</span>api<span class="token operator">/</span>v1<span class="token operator">/</span>jobposting?sort=title,created-at
                </code>
            </p>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">Filter Data</div>
        <div class="card-body">
            <p>The JSON API specification reserves the <code>filter</code> query parameter for
                <a href="http://jsonapi.org/format/1.0/#fetching-filtering">filtering resources</a>,
                by using <a href="https://laravel-json-api.readthedocs.io/en/latest/fetching/filtering/"> this package</a>.
                Filtering allows clients to search resources and reduce the number of resources returned in a response.<br/>
            </p>
            <p>
                As an example, imagine our job posting resource has a title filter that searches for posts that have titles starting with the provided value.
                This request would return any post that has a title starting with Hello<br/>
                <code class=" language-php">
                    <span class="token operator">/</span>api<span class="token operator">/</span>v1<span class="token operator">/</span>jobposting?filter[title]=Hello
                </code>
            </p>
            <p>
                By default, as filter always works as "beginning with". Alternative implementation like exact match, or includes will be mentioned in resource documentation.
            </p>

        </div>
    </div>
@endsection
