"use client";

import React, { useEffect } from "react";
import axios from "axios";
import { useFormik } from "formik";
import { useRouter } from "next/navigation";
import * as Yup from "yup";

const Edit = ({ params }: { params: { id: string } }) => {
  const router = useRouter();

  useEffect(() => {
    axios.get(`/api/${params.id}`).then((res) => {
      console.log(res.data.toDo);

      formik.setValues({
        title: res.data.toDo.title,
        description: res.data.toDo.description,
      });
    });
  }, []);

  const formik = useFormik({
    initialValues: { title: "", description: "" },
    validationSchema: Yup.object({
      title: Yup.string().required().max(255),
      description: Yup.string().required(),
    }),
    validateOnChange: false,
    onSubmit: async (value) => {
      axios
        .put(`/api/${params.id}/edit`, value)
        .then(() => router.push(`/${params.id}`))
        .catch((err) => {
          formik.setErrors({ description: err.message });
          return;
        });
    },
  });

  return (
    <div>
      <h2 className="font-bold text-3xl">Edit To Do</h2>
      <div>
        <form className="flex flex-col gap-3" onSubmit={formik.handleSubmit}>
          <div>
            <label htmlFor="title">Title</label>
            <input
              id="title"
              name="title"
              onChange={formik.handleChange}
              value={formik.values.title}
            />
            <br />
            {formik.errors.title ?? <p>{formik.errors.title}</p>}
          </div>
          <div>
            <label htmlFor="description">Description</label>
            <textarea
              id="description"
              name="description"
              onChange={formik.handleChange}
              value={formik.values.description}
            ></textarea>
            <br />
            {formik.errors.description ?? <p>{formik.errors.description}</p>}
          </div>
          <div>
            <button type="submit">Submit</button>
          </div>
        </form>
      </div>
    </div>
  );
};

export default Edit;
