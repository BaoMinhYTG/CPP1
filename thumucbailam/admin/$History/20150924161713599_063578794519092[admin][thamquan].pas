const fi='thamquam.inp';
        fo='thamquan.out';
        maxn=30000;
type mang=array[1..maxn] of longint;
var n,m:longint;
        d,v:mang;
        s:int64;
        f:text;

procedure doc;
        var
                i:word;
        begin
                assign(f,fi);
                reset(f);
                readln(f,n,m);
                for i:=1 to n do
                        read(f,d[i]);
                readln(f);
                for i:=1 to m do
                        read(f,v[i]);
                close(f);
        end;




procedure init;
        begin
                s:=0;
        end;
procedure quicksort(l, r:word; var a:mang);
    var
        i, j, x, y: word;
    begin
        i := l;
        j := r;
        x := a[(l+r) DIV 2];
        repeat
            while a[i] < x do i := i + 1;
            while x < a[j] do j := j - 1;
            if i <= j then
                begin
                    y := a[i];
                    a[i] := a[j];
                    a[j] := y;
                    i := i + 1;
                    j := j - 1;
                end;
            until i > j;
        if l < j then quicksort(l, j,a);
        if i < r then quicksort(i, r,a);
end;
procedure xuli;
        var i,j:longint;
        begin
                for i:=1 to n do
                        begin
                        s:=s+int64(d[i]*v[n-i+1]);
                               // writeln(i,' ',n-i+1);
                        end;
                //readln;
        end;
procedure ghi;

        var
                i:word;
        begin
                assign(f,fo);
                rewrite(f);
                writeln(f,s);
                close(f);
        end;
begin
        doc;
        init;
        quicksort(1,n,d);
        quicksort(1,m,v);
        xuli;
        ghi;
end.
