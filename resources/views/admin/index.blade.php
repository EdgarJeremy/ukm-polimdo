@extends('admin._root') 
@section('content')

<div class="ui grid">
    <div class="row">
        <h1 class="ui huge header">
            Dashboard
        </h1>
    </div>
    <div class="ui divider"></div>
    <hr>
    <div class="four column center aligned row">
        <div class="column">
            <img class="ui centered small image" src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMS4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTI7IiB4bWw6c3BhY2U9InByZXNlcnZlIiB3aWR0aD0iNTEycHgiIGhlaWdodD0iNTEycHgiPgo8Zz4KCTxnPgoJCTxwYXRoIHN0eWxlPSJmaWxsOiNEOERDRTE7IiBkPSJNMCwxMzR2MzI4YzAsMjIuMDU1LDE3Ljk0NSw0MCw0MCw0MGg0MzJjMjIuMDU1LDAsNDAtMTcuOTQ1LDQwLTQwVjEzNEgweiIvPgoJPC9nPgoJPGc+CgkJPHBhdGggc3R5bGU9ImZpbGw6I0ZGNEYxOTsiIGQ9Ik00NzIsMjJINDBDMTcuOTQ1LDIyLDAsMzkuOTQ1LDAsNjJ2NzJoNTEyVjYyQzUxMiwzOS45NDUsNDk0LjA1NCwyMiw0NzIsMjJ6IE02NCwxMDIgICAgYy0xMy4yNTUsMC0yNC0xMC43NDUtMjQtMjRzMTAuNzQ1LTI0LDI0LTI0czI0LDEwLjc0NSwyNCwyNFM3Ny4yNTUsMTAyLDY0LDEwMnogTTQ0OCwxMDJjLTEzLjI1NSwwLTI0LTEwLjc0NS0yNC0yNCAgICBzMTAuNzQ1LTI0LDI0LTI0czI0LDEwLjc0NSwyNCwyNFM0NjEuMjU1LDEwMiw0NDgsMTAyeiIvPgoJPC9nPgoJPGc+CgkJPGc+CgkJCTxwYXRoIHN0eWxlPSJmaWxsOiNGRkZGRkY7IiBkPSJNMjU2LDIwNmMtMTcuNjQ4LDAtMzIsMTQuMzUyLTMyLDMyczE0LjM1MiwzMiwzMiwzMnMzMi0xNC4zNTIsMzItMzJTMjczLjY0OCwyMDYsMjU2LDIwNnoiLz4KCQk8L2c+CgkJPGc+CgkJCTxwYXRoIHN0eWxlPSJmaWxsOiNGRkZGRkY7IiBkPSJNMTc2LDIwNmMtMTcuNjQ4LDAtMzIsMTQuMzUyLTMyLDMyczE0LjM1MiwzMiwzMiwzMnMzMi0xNC4zNTIsMzItMzJTMTkzLjY0OCwyMDYsMTc2LDIwNnoiLz4KCQk8L2c+CgkJPGc+CgkJCTxwYXRoIHN0eWxlPSJmaWxsOiNGRkZGRkY7IiBkPSJNOTYsMjA2Yy0xNy42NDgsMC0zMiwxNC4zNTItMzIsMzJzMTQuMzUyLDMyLDMyLDMyczMyLTE0LjM1MiwzMi0zMlMxMTMuNjQ4LDIwNiw5NiwyMDZ6Ii8+CgkJPC9nPgoJCTxnPgoJCQk8cGF0aCBzdHlsZT0iZmlsbDojRkZGRkZGOyIgZD0iTTMzNiwyMDZjLTE3LjY0OCwwLTMyLDE0LjM1Mi0zMiwzMnMxNC4zNTIsMzIsMzIsMzJjMTcuNjQ4LDAsMzItMTQuMzUyLDMyLTMyICAgICBTMzUzLjY0OCwyMDYsMzM2LDIwNnoiLz4KCQk8L2c+CgkJPGc+CgkJCTxwYXRoIHN0eWxlPSJmaWxsOiNGRkZGRkY7IiBkPSJNNDE2LDI3MGMxNy42NDgsMCwzMi0xNC4zNTIsMzItMzJzLTE0LjM1Mi0zMi0zMi0zMmMtMTcuNjQ4LDAtMzIsMTQuMzUyLTMyLDMyICAgICBTMzk4LjM1MSwyNzAsNDE2LDI3MHoiLz4KCQk8L2c+CgkJPGc+CgkJCTxwYXRoIHN0eWxlPSJmaWxsOiNGRkZGRkY7IiBkPSJNMjU2LDI4NmMtMTcuNjQ4LDAtMzIsMTQuMzUyLTMyLDMyczE0LjM1MiwzMiwzMiwzMnMzMi0xNC4zNTIsMzItMzJTMjczLjY0OCwyODYsMjU2LDI4NnoiLz4KCQk8L2c+CgkJPGc+CgkJCTxwYXRoIHN0eWxlPSJmaWxsOiNGRkZGRkY7IiBkPSJNMTc2LDI4NmMtMTcuNjQ4LDAtMzIsMTQuMzUyLTMyLDMyczE0LjM1MiwzMiwzMiwzMnMzMi0xNC4zNTIsMzItMzJTMTkzLjY0OCwyODYsMTc2LDI4NnoiLz4KCQk8L2c+CgkJPGc+CgkJCTxwYXRoIHN0eWxlPSJmaWxsOiNGRkZGRkY7IiBkPSJNOTYsMjg2Yy0xNy42NDgsMC0zMiwxNC4zNTItMzIsMzJzMTQuMzUyLDMyLDMyLDMyczMyLTE0LjM1MiwzMi0zMlMxMTMuNjQ4LDI4Niw5NiwyODZ6Ii8+CgkJPC9nPgoJCTxnPgoJCQk8cGF0aCBzdHlsZT0iZmlsbDojRkZGRkZGOyIgZD0iTTMzNiwyODZjLTE3LjY0OCwwLTMyLDE0LjM1Mi0zMiwzMnMxNC4zNTIsMzIsMzIsMzJjMTcuNjQ4LDAsMzItMTQuMzUyLDMyLTMyICAgICBTMzUzLjY0OCwyODYsMzM2LDI4NnoiLz4KCQk8L2c+CgkJPGc+CgkJCTxwYXRoIHN0eWxlPSJmaWxsOiNGRkZGRkY7IiBkPSJNNDE2LDI4NmMtMTcuNjQ4LDAtMzIsMTQuMzUyLTMyLDMyczE0LjM1MiwzMiwzMiwzMmMxNy42NDgsMCwzMi0xNC4zNTIsMzItMzIgICAgIFM0MzMuNjQ4LDI4Niw0MTYsMjg2eiIvPgoJCTwvZz4KCQk8Zz4KCQkJPHBhdGggc3R5bGU9ImZpbGw6I0ZGRkZGRjsiIGQ9Ik0yNTYsMzY2Yy0xNy42NDgsMC0zMiwxNC4zNTItMzIsMzJjMCwxNy42NDgsMTQuMzUyLDMyLDMyLDMyczMyLTE0LjM1MiwzMi0zMiAgICAgQzI4OCwzODAuMzUxLDI3My42NDgsMzY2LDI1NiwzNjZ6Ii8+CgkJPC9nPgoJCTxnPgoJCQk8cGF0aCBzdHlsZT0iZmlsbDojRkZGRkZGOyIgZD0iTTE3NiwzNjZjLTE3LjY0OCwwLTMyLDE0LjM1Mi0zMiwzMmMwLDE3LjY0OCwxNC4zNTIsMzIsMzIsMzJzMzItMTQuMzUyLDMyLTMyICAgICBDMjA4LDM4MC4zNTEsMTkzLjY0OCwzNjYsMTc2LDM2NnoiLz4KCQk8L2c+CgkJPGc+CgkJCTxwYXRoIHN0eWxlPSJmaWxsOiNGRkZGRkY7IiBkPSJNOTYsMzY2Yy0xNy42NDgsMC0zMiwxNC4zNTItMzIsMzJjMCwxNy42NDgsMTQuMzUyLDMyLDMyLDMyczMyLTE0LjM1MiwzMi0zMiAgICAgQzEyOCwzODAuMzUxLDExMy42NDgsMzY2LDk2LDM2NnoiLz4KCQk8L2c+CgkJPGc+CgkJCTxwYXRoIHN0eWxlPSJmaWxsOiNGRkZGRkY7IiBkPSJNMzM2LDM2NmMtMTcuNjQ4LDAtMzIsMTQuMzUyLTMyLDMyYzAsMTcuNjQ4LDE0LjM1MiwzMiwzMiwzMmMxNy42NDgsMCwzMi0xNC4zNTIsMzItMzIgICAgIEMzNjgsMzgwLjM1MSwzNTMuNjQ4LDM2NiwzMzYsMzY2eiIvPgoJCTwvZz4KCQk8Zz4KCQkJPHBhdGggc3R5bGU9ImZpbGw6I0ZGRkZGRjsiIGQ9Ik00MTYsMzY2Yy0xNy42NDgsMC0zMiwxNC4zNTItMzIsMzJjMCwxNy42NDgsMTQuMzUyLDMyLDMyLDMyYzE3LjY0OCwwLDMyLTE0LjM1MiwzMi0zMiAgICAgQzQ0OCwzODAuMzUxLDQzMy42NDgsMzY2LDQxNiwzNjZ6Ii8+CgkJPC9nPgoJPC9nPgoJPGc+CgkJPGc+CgkJCTxwYXRoIHN0eWxlPSJmaWxsOiM1QzU0NkE7IiBkPSJNNjQsOTBjLTYuNjI1LDAtMTItNS4zNzEtMTItMTJWMjJjMC02LjYyOSw1LjM3NS0xMiwxMi0xMnMxMiw1LjM3MSwxMiwxMnY1NiAgICAgQzc2LDg0LjYyOSw3MC42MjUsOTAsNjQsOTB6Ii8+CgkJPC9nPgoJPC9nPgoJPGc+CgkJPGc+CgkJCTxwYXRoIHN0eWxlPSJmaWxsOiM1QzU0NkE7IiBkPSJNNDQ4LDkwYy02LjYyNSwwLTEyLTUuMzcxLTEyLTEyVjIyYzAtNi42MjksNS4zNzUtMTIsMTItMTJzMTIsNS4zNzEsMTIsMTJ2NTYgICAgIEM0NjAsODQuNjI5LDQ1NC42MjUsOTAsNDQ4LDkweiIvPgoJCTwvZz4KCTwvZz4KCTxnPgoJCTxjaXJjbGUgc3R5bGU9ImZpbGw6I0ZGRDIwMDsiIGN4PSI5NiIgY3k9IjIzOCIgcj0iMzIiLz4KCTwvZz4KCTxnPgoJCTxjaXJjbGUgc3R5bGU9ImZpbGw6I0ZGOTYwMDsiIGN4PSIyNTYiIGN5PSIzOTgiIHI9IjMyIi8+Cgk8L2c+Cgk8Zz4KCQk8Y2lyY2xlIHN0eWxlPSJmaWxsOiNGRjRGMTk7IiBjeD0iMzM2IiBjeT0iMzE4IiByPSIzMiIvPgoJPC9nPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo="
            />
            <div class="ui hidden divider"></div>
            <div class="ui large green label">
                {{$t_activity}}
            </div>
            <p>
                Kegiatan
            </p>
        </div>
        <div class="column">
            <img class="ui centered small image" src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCA1MTIgNTEyIiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA1MTIgNTEyOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjUxMnB4IiBoZWlnaHQ9IjUxMnB4Ij4KPHBhdGggc3R5bGU9ImZpbGw6I0Q3REVFRDsiIGQ9Ik00OTcuODA3LDIzMi4zNTVsLTI5Ljk0NSw1Ljk5di04OC4yNzZsMjkuOTQ1LDUuOTlDNTA2LjA2LDE1Ny43MDksNTEyLDE2NC45NTQsNTEyLDE3My4zN3Y0MS42NzMgIEM1MTIsMjIzLjQ1OSw1MDYuMDYsMjMwLjcwNiw0OTcuODA3LDIzMi4zNTV6Ii8+CjxwYXRoIHN0eWxlPSJmaWxsOiNDN0NGRTI7IiBkPSJNNDk3LjgwNywyMDUuODczbC0yOS45NDUsNS45OXYyNi40ODNsMjkuOTQ1LTUuOTljOC4yNTMtMS42NTEsMTQuMTkzLTguODk2LDE0LjE5My0xNy4zMTJ2LTI2LjQ4MyAgQzUxMiwxOTYuOTc3LDUwNi4wNiwyMDQuMjIyLDQ5Ny44MDcsMjA1Ljg3M3oiLz4KPHBhdGggc3R5bGU9ImZpbGw6I0JFNEI1MDsiIGQ9Ik0yNi40ODMsMjU2aC04LjgyOEM3LjkwNCwyNTYsMCwyNDguMDk2LDAsMjM4LjM0NXYtODguMjc2YzAtOS43NTEsNy45MDQtMTcuNjU1LDE3LjY1NS0xNy42NTVoOC44MjggIFYyNTZ6Ii8+CjxwYXRoIHN0eWxlPSJmaWxsOiNEN0RFRUQ7IiBkPSJNMjI5LjUxNyw5Ny4xMDNWMjkxLjMxYzYxLjc5MywwLDE1OC44OTcsMjYuNDgzLDIyOS41MTcsODguMjc2VjguODI4ICBDMzg4LjQxNCw3MC42MjEsMjkxLjMxLDk3LjEwMywyMjkuNTE3LDk3LjEwM3oiLz4KPGc+Cgk8cGF0aCBzdHlsZT0iZmlsbDojOTU5Q0IzOyIgZD0iTTQ3Ni42OSwzODguNDE0aC04LjgyOGMtNC44NzUsMC04LjgyOC0zLjk1My04LjgyOC04LjgyOFY4LjgyOGMwLTQuODc1LDMuOTUzLTguODI4LDguODI4LTguODI4ICAgaDguODI4YzQuODc1LDAsOC44MjgsMy45NTMsOC44MjgsOC44Mjh2MzcwLjc1OUM0ODUuNTE3LDM4NC40NjEsNDgxLjU2NSwzODguNDE0LDQ3Ni42OSwzODguNDE0eiIvPgo8L2c+CjxwYXRoIHN0eWxlPSJmaWxsOiNEMjU1NUE7IiBkPSJNMjQyLjA1LDQ5NC4zNDVMMjQyLjA1LDQ5NC4zNDVjLTQuMjA3LDAtNy44MzEtMi45Ny04LjY1Ny03LjA5NkwxOTQuMjA3LDI5MS4zMUg5Ny4xMDMgIGwzOS44OCwxOTkuNDAxQzEzOS40NTksNTAzLjA5LDE1MC4zMjgsNTEyLDE2Mi45NTIsNTEyaDc5LjA5OGM0Ljg3NSwwLDguODI4LTMuOTUzLDguODI4LTguODI4ICBDMjUwLjg3OCw0OTguMjk3LDI0Ni45MjYsNDk0LjM0NSwyNDIuMDUsNDk0LjM0NXoiLz4KPHBhdGggc3R5bGU9ImZpbGw6I0JFNEI1MDsiIGQ9Ik0yMTEuODYyLDI5MS4zMXYxMC4xNzdjMCw0LjMxNi0zLjExOSw3Ljk5OC03LjM3Nyw4LjcwN2wtMTQxLjI0MSwyMy41NCAgYy01LjM4LDAuODk3LTEwLjI3OS0zLjI1Mi0xMC4yNzktOC43MDdWMjkxLjMxSDIxMS44NjJ6Ii8+CjxwYXRoIHN0eWxlPSJmaWxsOiNGRjY0NjQ7IiBkPSJNMjI5LjUxNywyOTEuMzFINTIuOTY2Yy0xOS41MDEsMC0zNS4zMS0xNS44MDktMzUuMzEtMzUuMzFWMTMyLjQxNCAgYzAtMTkuNTAxLDE1LjgwOS0zNS4zMSwzNS4zMS0zNS4zMWgxNzYuNTUyVjI5MS4zMXoiLz4KPHJlY3QgeD0iMjExLjg2MiIgeT0iOTcuMTAzIiBzdHlsZT0iZmlsbDojOTU5Q0IzOyIgd2lkdGg9IjE3LjY1NSIgaGVpZ2h0PSIxOTQuMjA3Ii8+CjxwYXRoIHN0eWxlPSJmaWxsOiNEMjU1NUE7IiBkPSJNMTcuNjU1LDIyOS41MTdoMTk0LjIwN3Y2MS43OTNINTIuOTY2Yy0xOS41MDEsMC0zNS4zMS0xNS44MDktMzUuMzEtMzUuMzFWMjI5LjUxN3oiLz4KPHJlY3QgeD0iMjExLjg2MiIgeT0iMjI5LjUxNyIgc3R5bGU9ImZpbGw6IzcwNzQ4NzsiIHdpZHRoPSIxNy42NTUiIGhlaWdodD0iNjEuNzkzIi8+CjxwYXRoIHN0eWxlPSJmaWxsOiNDN0NGRTI7IiBkPSJNMjI5LjUxNywyOTEuMzFjNjEuNzkzLDAsMTU4Ljg5NywyNi40ODMsMjI5LjUxNyw4OC4yNzZWMjczLjY1NSAgYy03MC42MjEtMjkuNDI2LTE2Ny43MjQtNDQuMTM4LTIyOS41MTctNDQuMTM4VjI5MS4zMXoiLz4KPHBhdGggc3R5bGU9ImZpbGw6IzcwNzQ4NzsiIGQ9Ik00NzYuNjksMjgyLjQ4M2gtOC44MjhjLTQuODc1LDAtOC44MjgtMy45NTMtOC44MjgtOC44Mjh2MTA1LjkzMWMwLDQuODc1LDMuOTUzLDguODI4LDguODI4LDguODI4ICBoOC44MjhjNC44NzUsMCw4LjgyOC0zLjk1Myw4LjgyOC04LjgyOFYyNzMuNjU1QzQ4NS41MTcsMjc4LjUzLDQ4MS41NjUsMjgyLjQ4Myw0NzYuNjksMjgyLjQ4M3oiLz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPC9zdmc+Cg=="
            />
            <div class="ui hidden divider"></div>
            <div class="ui large blue label">
                {{$t_announcement}}
            </div>
            <p>
                Pengumuman
            </p>
        </div>
        <div class="column">
            <img class="ui centered small image" src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCA1MDQuMTI0IDUwNC4xMjQiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUwNC4xMjQgNTA0LjEyNDsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSI1MTJweCIgaGVpZ2h0PSI1MTJweCI+CjxwYXRoIHN0eWxlPSJmaWxsOiNEMDdDNDA7IiBkPSJNMCwyMDAuODYyTDI1Mi4wNjIsNTEuMmwyNTIuMDYyLDE0OS42NjJ2MjIwLjU1NEgwVjIwMC44NjJ6Ii8+CjxwYXRoIHN0eWxlPSJmaWxsOiNFRkVGRUY7IiBkPSJNNTUuMTM4LDExLjgxNWgzOTMuODQ2YzguNjY1LDAsMTUuNzU0LDcuMDg5LDE1Ljc1NCwxNS43NTR2Mjc1LjY5MiAgYzAsOC42NjUtNy4wODksMTUuNzU0LTE1Ljc1NCwxNS43NTRINTUuMTM4Yy04LjY2NSwwLTE1Ljc1NC03LjA4OS0xNS43NTQtMTUuNzU0VjI3LjU2OUMzOS4zODUsMTguOTA1LDQ2LjQ3NCwxMS44MTUsNTUuMTM4LDExLjgxNSAgeiIvPgo8cGF0aCBzdHlsZT0iZmlsbDojMjZBNkQxOyIgZD0iTTQxNS45MDIsNDMuMzIzbDI1LjIwNi0zMS41MDhoNy44NzdjOC42NjUsMCwxNS43NTQsNy4wODksMTUuNzU0LDE1Ljc1NHYxNS43NTRINDE1LjkwMnogICBNMjExLjEwMiw0My4zMjNsMjUuMjA2LTMxLjUwOGg1NS4xMzhMMjY2LjI0LDQzLjMyM0gyMTEuMTAyeiBNMzkuMzg1LDQzLjMyM1YyNy41NjljMC04LjY2NSw3LjA4OS0xNS43NTQsMTUuNzU0LTE1Ljc1NGgzOS4zODUgIEw2OS4zMTcsNDMuMzIzSDM5LjM4NXoiLz4KPHBhdGggc3R5bGU9ImZpbGw6I0VGQzc1RTsiIGQ9Ik01MDQuMTIzLDQ2OC42NzdjMCwxMi45OTctMTAuNjM0LDIzLjYzMS0yMy42MzEsMjMuNjMxSDIzLjYzMUMxMC42MzQsNDkyLjMwOSwwLDQ4MS42NzQsMCw0NjguNjc3ICBWMjAwLjg2MmwyNTIuMDYyLDExMC4yNzdsMjUyLjA2Mi0xMTAuMjc3djI2Ny44MTVINTA0LjEyM3oiLz4KPHBhdGggc3R5bGU9ImZpbGw6I0U4QzE1QjsiIGQ9Ik01MDQuMTIzLDQ2OC42NzdjMCwxMi45OTctMTAuNjM0LDIzLjYzMS0yMy42MzEsMjMuNjMxSDIzLjYzMUMxMC42MzQsNDkyLjMwOSwwLDQ4MS42NzQsMCw0NjguNjc3ICB2LTQ3LjI2Mmw1MDQuMTIzLTIyMC41NTRWNDY4LjY3N3oiLz4KPHBhdGggc3R5bGU9ImZpbGw6I0Q2RDlEQjsiIGQ9Ik0xNjAuMjk1LDE1MS42MzFsMy4xNTEsMTYuNTQybC0yNS4yMDYtMzkuMzg1bC0zNS40NDYsNTUuMTM4Yy0wLjM5NCw1LjEyLDIyLjQ0OSw5LjA1OCw1MC44MDYsOS4wNTggIHM1MS4yLTMuOTM4LDUxLjItOS4wNThsLTMxLjExNC00Ni4wOEMxNzMuNjg2LDEzNy44NDYsMTYwLjI5NSwxNTEuNjMxLDE2MC4yOTUsMTUxLjYzMXogTTE2My40NDYsMTI5Ljk2OSAgYzUuNTE0LDAsOS44NDYtNC4zMzIsOS44NDYtOS44NDZzLTQuMzMyLTkuODQ2LTkuODQ2LTkuODQ2cy05Ljg0Niw0LjMzMi05Ljg0Niw5Ljg0NlMxNTcuOTMyLDEyOS45NjksMTYzLjQ0NiwxMjkuOTY5eiAgIE0yNDQuMTg1LDEyNi4wMzFoMTU3LjUzOGM0LjMzMiwwLDcuODc3LTMuNTQ1LDcuODc3LTcuODc3cy0zLjU0NS03Ljg3Ny03Ljg3Ny03Ljg3N0gyNDQuMTg1Yy00LjMzMiwwLTcuODc3LDMuNTQ1LTcuODc3LDcuODc3ICBTMjM5Ljg1MiwxMjYuMDMxLDI0NC4xODUsMTI2LjAzMXogTTQwMS43MjMsMTQxLjc4NUgyNDQuMTg1Yy00LjMzMiwwLTcuODc3LDMuNTQ1LTcuODc3LDcuODc3czMuNTQ1LDcuODc3LDcuODc3LDcuODc3aDE1Ny41MzggIGM0LjMzMiwwLDcuODc3LTMuNTQ1LDcuODc3LTcuODc3QzQwOS42LDE0NS4zMjksNDA2LjA1NSwxNDEuNzg1LDQwMS43MjMsMTQxLjc4NXogTTM2Mi4zMzgsMTczLjI5MkgyNDQuMTg1ICBjLTQuMzMyLDAtNy44NzcsMy41NDUtNy44NzcsNy44NzdzMy41NDUsNy44NzcsNy44NzcsNy44NzdoMTE4LjE1NGM0LjMzMiwwLDcuODc3LTMuNTQ1LDcuODc3LTcuODc3ICBDMzcwLjIxNSwxNzYuODM3LDM2Ni42NzEsMTczLjI5MiwzNjIuMzM4LDE3My4yOTJ6Ii8+CjxwYXRoIHN0eWxlPSJmaWxsOiNFMjU3NEM7IiBkPSJNMzEzLjUwMiw0My4zMjNsMjUuMjA2LTMxLjUwOGg1NS4xMzhMMzY4LjY0LDQzLjMyM0gzMTMuNTAyeiBNMTA4LjcwMiw0My4zMjNsMjUuMjA2LTMxLjUwOGg1NS4xMzggIEwxNjMuODQsNDMuMzIzSDEwOC43MDJ6Ii8+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo="
            />
            <div class="ui hidden divider"></div>
            <div class="ui large pink label">
                {{$t_letter}}
            </div>
            <p>
                Edaran Keluar
            </p>
        </div>
        <div class="column">
            <img class="ui centered small image" src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDQxMC4zMDkgNDEwLjMwOSIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNDEwLjMwOSA0MTAuMzA5OyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjUxMnB4IiBoZWlnaHQ9IjUxMnB4Ij4KPGc+Cgk8Zz4KCQk8cGF0aCBzdHlsZT0iZmlsbDojMDBBQ0VBOyIgZD0iTTM4Mi45NTUsNTguOTZjMTYuOTM2LDIuMTc2LDI5LjAxNCwxNy41MDcsMjcuMTY3LDM0LjQ4MkwzODYuMDksMzA2LjA3OSAgICBjLTEuODQ4LDE2LjkyMy0xNy4wNjYsMjkuMTQ0LTMzLjk4OSwyNy4yOTVjLTAuMzM5LTAuMDM3LTAuNjc3LTAuMDgtMS4wMTUtMC4xMjhoLTEuNTY3VjEzOC4zNzIgICAgYzAtMTcuMzEyLTE0LjAzNS0zMS4zNDctMzEuMzQ3LTMxLjM0N0g1Ni45NDdsNS43NDctNTIuMjQ1YzIuMTc5LTE3LjIyMywxNy43NDItMjkuNTM1LDM1LjAwNC0yNy42OUwzODIuOTU1LDU4Ljk2eiIvPgoJCTxwYXRoIHN0eWxlPSJmaWxsOiMwMENFQjQ7IiBkPSJNMzQ5LjUxOCwzMzMuMjQ2djE4LjgwOGMwLDE3LjMxMi0xNC4wMzUsMzEuMzQ3LTMxLjM0NywzMS4zNDdIMzEuMzQ3ICAgIEMxNC4wMzUsMzgzLjQwMSwwLDM2OS4zNjYsMCwzNTIuMDU0di00My44ODZsODYuMjA0LTYyLjY5NGMxMy42NjgtMTAuMzcsMzIuNzk0LTkuNDkxLDQ1LjQ1MywyLjA5bDU3LjQ2OSw1MC4xNTUgICAgYzEyLjA0NiwxMC4yMTUsMjkuMjM4LDExLjY4Myw0Mi44NDEsMy42NTdsMTE3LjU1MS02OC45NjNWMzMzLjI0NnoiLz4KCQk8cGF0aCBzdHlsZT0iZmlsbDojMDBFRkQxOyIgZD0iTTM0OS41MTgsMTM4LjM3MnY5NC4wNDFsLTExNy41NTEsNjguOTYzYy0xMy42MDMsOC4wMjYtMzAuNzk1LDYuNTU4LTQyLjg0MS0zLjY1N2wtNTcuNDY5LTUwLjE1NSAgICBjLTEyLjY1OS0xMS41OC0zMS43ODUtMTIuNDYtNDUuNDUzLTIuMDlMMCwzMDguMTY4VjEzOC4zNzJjMC0xNy4zMTIsMTQuMDM1LTMxLjM0NywzMS4zNDctMzEuMzQ3aDI4Ni44MjQgICAgQzMzNS40ODQsMTA3LjAyNiwzNDkuNTE4LDEyMS4wNiwzNDkuNTE4LDEzOC4zNzJ6Ii8+Cgk8L2c+Cgk8Y2lyY2xlIHN0eWxlPSJmaWxsOiNENEUxRjQ7IiBjeD0iMjA4Ljk4IiBjeT0iMTkyLjcwNyIgcj0iMzMuNDM3Ii8+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPC9zdmc+Cg=="
            />
            <div class="ui hidden divider"></div>
            <div class="ui large red label">
                {{$t_gallery}}
            </div>
            <p>
                Galeri
            </p>
        </div>
    </div>
    <div class="ui hidden section divider"></div>
</div>
@endsection