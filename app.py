import pandas as pd
import time
import matplotlib.pyplot as plt
import heapq

df_100 = pd.read_csv('data_100.csv')
df_200 = pd.read_csv('data_200.csv')
df_300 = pd.read_csv('data_300.csv')
df_400 = pd.read_csv('data_400.csv')
df_500 = pd.read_csv('data_500.csv')

def b_graph(df):
    graph = {}
    nodes = set()

    for _, row in df.iterrows():
        try:
            # Extract ID from format "Name (ID)" or directly if it's just "ID"
            u_raw, v_raw = str(row['Lokasi_Awal']), str(row['Lokasi_Tujuan'])
            u = int(u_raw.split('(')[1].split(')')[0]) if '(' in u_raw else int(u_raw)
            v = int(v_raw.split('(')[1].split(')')[0]) if '(' in v_raw else int(v_raw)
            w = float(row['Jarak_km'])
            
            nodes.update([u, v])
            graph.setdefault(u, []).append((v, w))
            graph.setdefault(v, []).append((u, w))
        except (IndexError, ValueError):
            continue
    
    return graph, nodes

def dijkstra(graph, start):
    """
    Implementasi algoritma Dijkstra dengan metode iteratif
    """
    dist = {v: float('inf') for v in graph}
    visited = {v: False for v in graph}      
    dist[start] = 0                                
    pq = [(0, start)]                              
    
    while pq: # Iterasi selama priority queue tidak kosong / sebanyak V
        d, u = heapq.heappop(pq) # Mengambil node dengan jarak terkecil dari priority queue
        # Kompleksitas heap = log(V)
        
        if visited[u]:
            continue

        visited[u] = True

        if d > dist[u]:
            continue
            
        for v, weight in graph[u]: # Iterasi sebanyak E / deg(u) / banyak tetangga node u
            if not visited[v] and dist[v] > dist[u] + weight: # Jika node v belum dikunjungi dan jarak ke v lebih besar dari jarak ke u + bobot edge uv
                dist[v] = dist[u] + weight # Update jarak ke v
                heapq.heappush(pq, (dist[v], v)) # Menambahkan node v ke priority queue
                # Kompleksitas heap = log(V)
    
    return dist

def dijkstra_recur(graph, dist, visited, pq):
    """
    Implementasi algoritma Dijkstra dengan metode rekursif
    """
    if not pq:
        return

    d, u = heapq.heappop(pq)

    if visited[u]:
        dijkstra_recur(graph, dist, visited, pq)
        return

    visited[u] = True

    for v, weight in graph[u]:
        if not visited[v] and dist[v] > dist[u] + weight:
            dist[v] = dist[u] + weight
            heapq.heappush(pq, (dist[v], v))
    
    dijkstra_recur(graph, dist, visited, pq)

def dijkstra_rekursif(graph, start):
    dist = {v: float('inf') for v in graph}
    visited = {v: False for v in graph}
    dist[start] = 0
    pq = [(0, start)]
    dijkstra_recur(graph, dist, visited, pq)
    return dist

def run_experiment(df, start_node, func):
    graph, _ = b_graph(df)
    start_time = time.time()
    func(graph, start_node)
    return time.time() - start_time

sizes = [100, 200, 300, 400, 500] # Banyak node
times_iterative = []
times_recursive = []
import tracemalloc

mem_iterative = []
mem_recursive = []

def run_experiment(df, start_node, func):
    graph, _ = b_graph(df)
    tracemalloc.start()
    start_time = time.time()
    func(graph, start_node)
    duration = time.time() - start_time
    _, peak = tracemalloc.get_traced_memory()
    tracemalloc.stop()
    
    if func.__name__ == 'dijkstra_rekursif':
        mem_recursive.append(peak / 10**6)
    else:
        mem_iterative.append(peak / 10**6)
    return duration

for size in sizes:
    df_subset = globals()[f'df_{size}']
    times_iterative.append(run_experiment(df_subset, 0, dijkstra))
    times_recursive.append(run_experiment(df_subset, 0, dijkstra_rekursif))

print("Waktu iteratif:", times_iterative)
print("Waktu rekursif:", times_recursive)

print("Memori iteratif:", mem_iterative)
print("Memori rekursif:", mem_recursive)

plt.figure(figsize=(12, 5))

plt.subplot(1, 2, 1)
plt.plot(sizes, times_iterative, marker='o', color='blue')
plt.xlabel("Jumlah Node (V)")
plt.ylabel("Running Time (detik)")
plt.title("Running Time Dijkstra (Iteratif)")
plt.grid(True)

plt.subplot(1, 2, 2)
plt.plot(sizes, times_recursive, marker='s', color='red')
plt.xlabel("Jumlah Node (V)")
plt.ylabel("Running Time (detik)")
plt.title("Running Time Dijkstra (Rekursif)")
plt.grid(True)

plt.tight_layout()
plt.show()

plt.figure(figsize=(12, 5))

plt.subplot(1, 2, 1)
plt.plot(sizes, mem_iterative, marker='o', color='blue')
plt.xlabel("Jumlah Node (V)")
plt.ylabel("Memory Usage (MB)")
plt.title("Memory Usage Dijkstra (Iteratif)")
plt.grid(True)

plt.subplot(1, 2, 2)
plt.plot(sizes, mem_recursive, marker='s', color='red')
plt.xlabel("Jumlah Node (V)")
plt.ylabel("Memory Usage (MB)")
plt.title("Memory Usage Dijkstra (Rekursif)")
plt.grid(True)

plt.tight_layout()
plt.show()
