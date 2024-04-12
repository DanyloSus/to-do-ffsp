"use client";

import { ToDoType } from "@/types/ToDo";
import axios from "axios";
import Link from "next/link";
import React, { useEffect, useState } from "react";

const Home = () => {
  const [toDos, setToDos] = useState<Array<ToDoType>>();

  useEffect(() => {
    axios.get("/api").then((res) => {
      setToDos(res.data.toDos);
    });
  }, []);

  return (
    <div>
      <h2 className="font-bold text-3xl">To Do List</h2>
      <div>
        <Link href="/create">Create</Link>
      </div>
      {toDos?.length ? (
        toDos.map((toDo) => (
          <div className="flex flex-col gap-3">
            <Link
              href={toDo._id}
              className="hover:font-medium hover:text-xl transition-all"
            >
              {toDo.title}
            </Link>
          </div>
        ))
      ) : (
        <div className="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
          It's nothing here, yet...
        </div>
      )}
    </div>
  );
};

export default Home;
